<?php

namespace App\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryList extends Component
{
    use WithPagination;

    public $pagination = 10;

    #[Url(history: true)]
    public $search = '';

    public $gallery_id;
    public function render()
    {
if(! $this->search){

    $gallery = Gallery::latest()->paginate($this->pagination);
}else{
    $gallery = Gallery::latest()->where('title', 'like', '%' . $this->search. '%')->paginate($this->pagination);
}

        return view('livewire.admin.gallery.gallery-list', compact(['gallery']))->layout('layouts.admin-app')->layoutData([
            'title' => 'Gallery || Menoman Care Foundation',
        ]);
    }


    public function delete($gallery_id)
    {
        $this->gallery_id = $gallery_id;
    }

    public function destroy()
    {
        $gallery = Gallery::findOrFail($this->gallery_id);
        $gallery->delete();
        Storage::delete($gallery->image);
        $gallery->delete();
        session()->flash('success', 'Gallery Successfully Deleted');
        $this->dispatch('close-modal');
    }


    
    
}