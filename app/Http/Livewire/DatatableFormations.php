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

    public bool $statusAsc = false;
    public bool $priceAsc = false;

    public bool $confirmingDeletion = false;
    public int $IdBeingDeleted = 0;

    protected $queryString = [
        'search' => ['except' => ''],
        'paginate' => ['except' => 25],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function statusAsc(){
        $this->statusAsc = !$this->statusAsc;
    }

    public function priceAsc(){
        $this->priceAsc = !$this->priceAsc;
    }

    public function render()
    {
        $formations = Formation::where('title','LIKE', '%' . $this->search . '%')
            ->orderBy('status', $this->statusAsc ? 'asc' : 'desc')
            ->orderBy('price', $this->priceAsc ? 'asc' : 'desc')
            ->paginate($this->paginate);
        
        return view('livewire.datatable-formations', [
            'formations' => $formations,
        ]);
    }

    public function deleteModal($id)
    {
        $this->confirmingDeletion = true;
        $this->IdBeingDeleted = $id;
    }
}
