<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FormationCreator extends Component
{  
    use WithFileUploads;

    public string $title;
    public string $description;
    public float $price;
    public string $status;
    public $img;
    public array $chapters = [];

    public function mount($formation = null){
        if($formation){
            
        }
    }

    public function render()
    {
        return view('livewire.formation-creator');
    }

    public function store() {
        
    }

    public function addChapter() {
        $this->chapters[] = [
            'title' => '',
            'content' => '',
        ];
    }

    public function deleteChapter(int $index) {
        unset($this->chapters[$index]);
        $this->chapters = array_values($this->chapters);
    }

    public function addFile() {

    }

    public function deleteFile() {

    }
}
