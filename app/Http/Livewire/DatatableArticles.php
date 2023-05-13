<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class DatatableArticles extends Component
{
    use WithPagination;

    public array $paginates = [25, 50, 100];
    public int $paginate = 25;
    public string $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'paginate' => ['except' => 25],
    ];

    public bool $dateAsc = false;
    public bool $statusAsc = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function dateAsc(){
        $this->dateAsc = !$this->dateAsc;
    }

    public function statusAsc(){
        $this->statusAsc = !$this->statusAsc;
    }

    public function render()
    {
        $articles = Article::where('title','LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', $this->dateAsc ? 'asc' : 'desc')
            ->orderBy('status', $this->statusAsc ? 'asc' : 'desc')
            ->paginate($this->paginate);

        return view('livewire.datatable-articles', [
            'articles' => $articles,
        ]);
    }
}
