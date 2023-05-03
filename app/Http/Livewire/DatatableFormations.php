<?php

namespace App\Http\Livewire;

use App\Models\Formation;
use Livewire\Component;
use Livewire\WithPagination;

class DatatableFormations extends Component
{

    use WithPagination;

    public array $paginates = [25, 50, 100];
    public int $paginate = 25;
    public string $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'paginate' => ['except' => 25],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.datatable-formations', [
            'formations' => Formation::where('title','LIKE', '%' . $this->search . '%')->paginate($this->paginate),
        ]);
    }
}
