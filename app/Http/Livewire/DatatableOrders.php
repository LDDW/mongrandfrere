<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class DatatableOrders extends Component
{
    use WithPagination;

    public array $paginates = [25, 50, 100];
    public int $paginate = 25;
    public string $search = '';

    public bool $dateAsc = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'paginate' => ['except' => 25],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function dateAsc(){
        $this->dateAsc = !$this->dateAsc;
    }

    public function render()
    {
        $orders = Order::where('id','LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', $this->dateAsc ? 'asc' : 'desc')
            ->with('user')
            ->with('formation')
            ->paginate($this->paginate);

        return view('livewire.datatable-orders', [
            'orders' => $orders,
        ]);
    }
}
