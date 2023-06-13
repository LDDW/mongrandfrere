<?php

namespace App\Http\Livewire;

use App\Models\File;
use App\Models\Formation;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Usernotnull\Toast\Concerns\WireToast;

class FormFormation extends Component
{
    use WireToast;
    use WithFileUploads;

    public bool $isEdit = false;

    public string $title = '';
    public $price = 0;
    public string $content = '';
    public string $status = 'draft';
    public $img;
    public array $files = [];
    public bool $imgAsChanged = false;

    public $formation;

    protected $listeners = [
        'contentUpdated' => 'setContent',
    ];

    public function mount(){
        if(isset($this->formation)){
            $this->isEdit = true;
            $this->title = $this->formation->title;
            $this->content = $this->formation->content;
            $this->status = $this->formation->status;
            $this->img = $this->formation->img_name;
            $this->price = $this->formation->price;

            if(count($this->formation->file()->get()) > 0){
                foreach($this->formation->file()->get() as $file){
                    $this->files[] = [
                        'id' => $file->id,
                        'file_name' => $file->file_name,
                    ];
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.form-formation');
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function imgAsChanged() {
        $this->imgAsChanged = true;
    }

    public function setImageStorage() {
        $this->img->storeAs('formations', $this->img->getClientOriginalName(), 'public');
    }

    public function setFileStorage($index) {
        $this->files[$index]['file']->storeAs('formations', $this->files[$index]['file']->getClientOriginalName());
    }

    public function submit(){
        $this->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:draft,published'
        ]+ (!$this->isEdit ? [
            'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ] : []) + (count($this->files) > 0 ? [
            'files.*.file' => 'sometimes|required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpeg,png,jpg|max:2048',
            'files.*.file_name' => 'required|string|min:3|max:255|distinct',
        ] : []));

        $backtrace = debug_backtrace()[0];

        try {

            $array = [
                'title' => $this->title,
                'content' => $this->content,
                'price' => floatval($this->price),
                'status' => $this->status,
            ];

            // save article to database
            if($this->isEdit){
                Formation::where('id', $this->formation->id)->update($array);
            } else {
                Formation::create($array);
            }

            // image upload to storage
            if(isset($this->img) && gettype($this->img) !== 'string'){
                if($this->isEdit && $this->imgAsChanged){
                    // delete old image
                    unlink(public_path('storage/formations/' . $this->formation->img_name));
                    $this->setImageStorage();
                    $array['img_name'] = $this->img->getClientOriginalName();
                } else {
                    $this->setImageStorage();
                    $array['img_name'] = $this->img->getClientOriginalName();
                }
            }

            // file upload / update to storage
            $fileIds = array_column($this->files, 'id');

            File::where('formation_id', $this->formation->id)
                ->whereNotIn('id', $fileIds)
                ->delete();

            foreach ($this->files as $index => $file) {
                if (! empty($file['id'])) {

                    $fileIsFinded = File::where('id', $file['id'])
                        ->where('formation_id', $this->formation->id)
                        ->first();   
                        
                    if ($fileIsFinded) {
                        $extension = Str::afterLast($fileIsFinded->file_name, '.');
                        $fileNameHasAlreadyExtension = pathinfo($file['file_name'], PATHINFO_EXTENSION);

                        $fileIsFinded->update([
                            'file_name' => $file['file_name']. ($fileNameHasAlreadyExtension ? '' : ".{$extension}"),
                        ]);
                    }
                    
                } else {
                    File::create([
                        'file_name' => trim($file['file_name'].'.'.$file['file']->getClientOriginalExtension()),
                        'formation_id' => $this->formation->id,
                    ]);

                    $this->setFileStorage($index);
                }
            }

            // toast success for ui
            toast()
                ->success('La formation a bien été créé !', 'Création réussite')
                ->pushOnNextPage();

            // log success
            Log::info("La formation a bien été créé", [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
            ]);

        } catch (Exception $e) {
            // toast error for ui
            toast()
                ->danger('La formation n\'a pas pu être créé !', 'Création échouée')
                ->pushOnNextPage();
            
            // log error
            Log::error("La formation n'a pas pu être créé", [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
                'error' => $e->getMessage(),
            ]);
        }

        // redirect
        return redirect()->route('admin.formations');
    }

    public function addFile()
    {
        $this->files[] = [
            'id' => null,
            'file' => null,
            'file_name' => '',
        ];
    }

    public function removeFile($index)
    {
        unset($this->files[$index]);
        $this->files = array_values($this->files);
    }
}
