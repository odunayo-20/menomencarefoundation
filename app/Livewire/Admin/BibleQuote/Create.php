<?php

namespace App\Livewire\Admin\BibleQuote;

use Livewire\Component;
use App\Models\BibleQuote;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{


    use WithFileUploads;

    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('required|string')]
    public $quote;

    #[Validate('required|string|max:100')]
    public $book;

    #[Validate('required|string|max:10')]
    public $chapter;

    #[Validate('required|string|max:10')]
    public $verse;

    #[Validate('nullable|string')]
    public $explanation;

    #[Validate('nullable|image|max:2048')]
    public $image;

    #[Validate('boolean')]
    public $is_active = true;

    public function store()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('bible-quotes', 'public');
        }

        BibleQuote::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'quote' => $this->quote,
            'book' => $this->book,
            'chapter' => $this->chapter,
            'verse' => $this->verse,
            'explanation' => $this->explanation,
            // 'image' => $imagePath,
             'is_active' => $this->is_active,
        ]);

        session()->flash('success', 'Bible quote created successfully!');
        $this->reset();
        return redirect()->route('admin_bible_quote');
    }



    public function render()
    {
        return view('livewire.admin.bible-quote.create')->layout('layouts.admin-app')->layoutData([
            'title' => 'Create Bible Quote || Menoman Care Foundation',
        ]);
    }
}
