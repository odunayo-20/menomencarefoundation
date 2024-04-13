<?php

namespace App\Livewire\Frontend;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class FrontGallery extends Component
{
use WithPagination;
    public function render()
    {
        $gallery = Gallery::paginate(2);
        return view('livewire.frontend.front-gallery', compact(['gallery']))->layout('layouts.frontend-app')->layoutData([
            'title' => 'Gallery || Menoman Care Foundation',
        ]);
    }


}