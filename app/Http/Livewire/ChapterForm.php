<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChapterForm extends Component
{
    use WithFileUploads;

    public array $files;

    public function mount() {
        $this->addFile();
    }

    public function render()
    {
        return view('livewire.chapter-form');
    }

    public function addFile()
    {
        $this->files[] = [
            'title' => '',
            'file' => '',
        ];
    }

    public function removeFile($index)
    {
        if(count($this->files) > 1) {
            unset($this->files[$index]);
            $this->files = array_values($this->files);
        }
    }
}
