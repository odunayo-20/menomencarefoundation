<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use App\Models\EventUpload;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEventUpload extends Component
{
    use WithFileUploads;
    
public $title, $pastEvents;
#[Rule('required')]
public $images = [];

public function mount(){
    $this->pastEvents = Event::latest()->where('date', '<=', now())->where('status', 'Active')->get();
}

public function store()
{
    $this->validate();
    // $this->validate([
    //     'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048', 
    //     'title' => 'required|string', 
    // ]);

    if (is_array($this->images)) {
        foreach ($this->images as $image) {
            $result = $image->store('public/event/upload');
            EventUpload::create([
                'event_id' => $this->title,
                'images' => $result,
            ]);

        }
    }

    session()->flash('success', 'Upload Successfully Created');

    return redirect(route('admin_event'));

}

public function cancelImage($index)
{
    unset($this->images[$index]);
}



    
    public function render()
    {
        return view('livewire.admin.event.admin-event-upload')->layout('layouts.admin-app')->layoutData([
            'title' => 'Event || Menoman Care Foundation',
        ]);
    }
}