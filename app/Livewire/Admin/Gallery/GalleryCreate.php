<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryCreate extends Component
{
    use WithFileUploads;

    public $images = [];
    public $title;

    // public $image;
    public function render()
    {
        return view('livewire.admin.gallery.gallery-create')->layout('layouts.admin-app')->layoutData([
            'title' => 'Gallery || Menoman Care Foundation',
        ]);
    }


    public function store()
    {
        // $this->validate();
        $this->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048', // Adjust validation rules as needed
            'title' => 'required|min:10|string', 
        ]);

        if (is_array($this->images)) {
            foreach ($this->images as $image) {
                $result = $image->store('public/gallery');
                Gallery::create([
                    'title' => $this->title,
                    'image' => $result,
                ]);

            }
        }

        session()->flash('success', 'Gallery Successfully Created');

        return redirect(route('admin_gallery'));

    }

    public function cancelImage($index)
    {
        unset($this->images[$index]);
    }

    // public function resetInput($field){
    //     $this->$field = null;
    //     $this->resetValidation($field);
    // }
}