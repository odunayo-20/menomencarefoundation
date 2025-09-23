<?php

namespace App\Livewire\Frontend\BibleQuote;

use App\Models\BibleQuote;
use Livewire\Component;

class View extends Component
{

    public $quote;

    public function mount($quote)
    {
        $this->quote = BibleQuote::where('slug', $quote)->where('is_active', true)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.frontend.bible-quote.view')->layout('layouts.frontend-app')->layoutData([
            'title' => 'Bible Quote || Menoman Care Foundation',
        ]);
    }
}
