<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DatatableUsers extends Component
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
        $users = User::where('lastname','LIKE', '%' . $this->search . '%')
            ->orWhere('firstname','LIKE', '%' . $this->search . '%')
            ->orWhere('email','LIKE', '%' . $this->search . '%')
            ->withCount('order')
            ->paginate($this->paginate);

        return view('livewire.datatable-users', [
            'users' => $users,
        ]);
    }
}
