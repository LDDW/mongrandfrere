<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Usernotnull\Toast\Concerns\WireToast;

class FormArticle extends Component
{
    use WireToast;
    use WithFileUploads;

    public bool $isEdit = false;

    public string $title = '';
    public string $content = '';
    public string $status = 'draft';
    public $img;
    public bool $imgAsChanged = false;

    public $article;

    protected $listeners = [
        'contentUpdated' => 'setContent',
    ];

    public function mount(){
        if(isset($this->article)){
            $this->isEdit = true;
            $this->title = $this->article->title;
            $this->content = $this->article->content;
            $this->status = $this->article->status;
            $this->img = $this->article->img_name;
        }
    }

    public function render()
    {
        return view('livewire.form-article');
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function imgAsChanged() {
        $this->imgAsChanged = true;
    }

    public function setImageStorage() {
        $this->img->storeAs('articles', $this->img->getClientOriginalName(), 'public');
    }

    public function submit(){
        $this->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'status' => 'required|in:draft,published',
        ] + (!$this->isEdit ? [
            'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ] : []));

        $backtrace = debug_backtrace()[0];

        try {

            $array = [
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status,
            ];
            
            // save article to database
            if($this->isEdit){
                Article::where('id', $this->article->id)->update($array);
            } else {
                Article::create($array);
            }

            // image upload to storage
            if(isset($this->img) && gettype($this->img) !== 'string'){
                if($this->isEdit && $this->imgAsChanged){
                    // delete old image
                    unlink(public_path('storage/articles/' . $this->article->img_name));
                    $this->setImageStorage();
                    $array['img_name'] = $this->img->getClientOriginalName();
                } else {
                    $this->setImageStorage();
                    $array['img_name'] = $this->img->getClientOriginalName();
                }
            }

            // toast success
            toast()
                ->success('L\'article a bien été créé !', 'Création réussite')
                ->pushOnNextPage();
            
            // log success
            Log::info('Article created', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
            ]);

        } catch (Exception $e) {
            // toast error
            toast()
                ->danger('L\'article n\'a pas été créé !', 'Erreur')
                ->pushOnNextPage();

            // log error 
            Log::error('Erreur avec la création de l\'article', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
                'error' => $e->getMessage(),
            ]);
        }

        // redirect
        return redirect()->route('admin.articles');
    }
}
