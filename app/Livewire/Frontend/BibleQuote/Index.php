<?php

namespace App\Livewire\Frontend\BibleQuote;

use Livewire\Component;
use App\Models\BibleQuote;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search = '';
    public $selectedBook = '';
    public $perPage = 10;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedBook()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'selectedBook']);
    }

    public function render()
    {
        $quotes = BibleQuote::query()
            ->where('is_active', true)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('book', 'like', '%' . $this->search . '%')
                      ->orWhere('quote', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->selectedBook, function ($query) {
                $query->where('book', $this->selectedBook);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        $books = BibleQuote::where('is_active', true)
            ->select('book')
            ->groupBy('book')
            ->orderBy('book')
            ->pluck('book');

        return view('livewire.frontend.bible-quote.index', [
            'quotes' => $quotes,
            'books' => $books
        ])->layout('layouts.frontend-app')->layoutData([
            'title' => 'Bible Quotes || Menoman Care Foundation',
        ]);
    }

    // public function render()
    // {
    //     return view('livewire.frontend.bible-quote.index');
    // }
}
