<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEventEdit extends Component
{
    public $old_image;
    public $event;
    #[Rule('required|string|min:4')]
    public $title;
    #[Rule('required|string|min:10')]
    public $location;
    #[Rule('required|string|min:10')]
    public $content;
    #[Rule('required|string')]
    public $date;
    #[Rule('required|string')]
    public $time;

    #[Rule('required|mimes:png,jpeg,jpg|max:5000')]
    public $new_image;

    use WithFileUploads;

    public function render()
    {
        return view('livewire.admin.event.admin-event-edit')->layout('layouts.admin-app')->layoutData([
            'title' => 'Event || Menoman Care Foundation'
        ]);
    }

    public function mount(Event $event){
        $this->event = $event;
        $this->title = $event->title;
        $this->content = $event->content;
        $this->location = $event->location;
        $this->date = $event->date;
        $this->time = $event->time;
        $this->old_image = $event->image;
    }

    public function store(){
        if ($this->new_image) {
            # code...
            $validated = $this->validate();
        }
        
        $image = $this->event->image;
if($this->new_image){
    Storage::delete($this->old_image);

$image = $this->new_image->store('public/events');
}
        $this->event->update([
'title' => $this->title,
'location' => $this->location,
'content' => $this->content,
'date' => $this->date,
'time' => $this->time,
'image' => $image,
        ]);
        $this->reset();
        session()->flash('success', 'Event Successfully Updated');
      return redirect(route('admin_event'));
    }
}