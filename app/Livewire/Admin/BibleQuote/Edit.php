<?php

namespace App\Livewire\Admin\BibleQuote;

use Livewire\Component;
use App\Models\BibleQuote;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{

    use WithFileUploads;

    public BibleQuote $quote;

    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('required|string')]
    public $quote_text;

    #[Validate('required|string|max:100')]
    public $book;

    #[Validate('required|string|max:10')]
    public $chapter;

    #[Validate('required|string|max:10')]
    public $verse;

    #[Validate('nullable|string')]
    public $explanation;

    // #[Validate('nullable|image|max:2048')]
    // public $image;

    #[Validate('boolean')]
    public $is_active = true;

    public $currentImage;

    public function mount(BibleQuote $quote)
    {
        $this->quote = $quote;
        $this->title = $quote->title;
        $this->quote_text = $quote->quote;
        $this->book = $quote->book;
        $this->chapter = $quote->chapter;
        $this->verse = $quote->verse;
        $this->explanation = $quote->explanation;
        $this->is_active = $quote->is_active;
        // $this->currentImage = $quote->image;
    }

    public function update()
    {
        // $this->validate();

        // $imagePath = $this->currentImage;

        // if ($this->image) {
        //     // Delete old image if exists
        //     if ($this->currentImage) {
        //         Storage::disk('public')->delete($this->currentImage);
        //     }
        //     $imagePath = $this->image->store('bible-quotes', 'public');
        // }

        $this->quote->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'quote' => $this->quote_text,
            'book' => $this->book,
            'chapter' => $this->chapter,
            'verse' => $this->verse,
            'explanation' => $this->explanation,
            // 'image' => $imagePath,
             'is_active' => $this->is_active ? 1 : 0,
        ]);

        session()->flash('success', 'Bible quote updated successfully!');
        return redirect()->route('admin_bible_quote');
    }

    public function removeImage()
    {
        if ($this->currentImage) {
            Storage::disk('public')->delete($this->currentImage);
            $this->quote->update(['image' => null]);
            $this->currentImage = null;
            session()->flash('success', 'Image removed successfully!');
        }
    }

    public function render()
    {
        return view('livewire.admin.bible-quote.edit')->layout('layouts.admin-app')->layoutData([
            'title' => 'Edit Bible Quote || Menoman Care Foundation',
        ]);
    }
}
