<?php

namespace App\Livewire\Admin\BibleQuote;

use Livewire\Component;
use App\Models\BibleQuote;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;

class Index extends Component
{


    use WithPagination;

    #[Url]
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDir = 'desc';
    public $perPage = 10;

    public $quote_id;

    protected $paginationTheme = 'bootstrap';


public function render()
    {
        $quotes = BibleQuote::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('book', 'like', '%' . $this->search . '%')
                      ->orWhere('quote', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

            // if(! $this->search){
            //     $quotes = BibleQuote::latest()->paginate($this->perPage);
            // }else{
            //     $quotes = BibleQuote::latest()->where('title', 'like', '%'.$this->search.'%')->orwhere('book', 'like', '%'.$this->search.'%')->orwhere('quote', 'like', '%'.$this->search.'%')->paginate($this->perPage);
            // }



        return view('livewire.admin.bible-quote.index', compact('quotes'))->layout('layouts.admin-app')->layoutData([
            'title' => 'Bible Quotes || Menoman Care Foundation',
        ]);
    }


    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDir = $this->sortDir === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDir = 'asc';
        }
    }



    public function toggleStatus($id)
    {
        $quote = BibleQuote::find($id);
        if ($quote) {
            $quote->update(['is_active' => !$quote->is_active]);
            session()->flash('success', 'Status updated successfully!');
        }
    }


    public function delete($quote_id)
    {
        $this->quote_id = $quote_id;
    }

    public function destroy()
    {
        $quote = BibleQuote::find($this->quote_id);
        if ($quote) {
            if ($quote->image) {
                Storage::disk('public')->delete($quote->image);
            }
            $quote->delete();
            session()->flash('success', 'Bible quote deleted successfully!');
        }

        // close modal (blade listens for browser event close-modal previously used)
         $this->dispatch('close-modal');
    }

    public function updateStatus($id, $status)
    {

        $quote = BibleQuote::find($id);
        if ($quote) {
            $quote->update(['is_active' => $status]);
            session()->flash('success', 'Status updated successfully!');
        }
    }




}
