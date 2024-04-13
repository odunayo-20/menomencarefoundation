<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Livewire\Attributes\Rule;

class AdminEventCreate extends Component
{
    #[Rule('required|string|min:4')]
    public $title;
    #[Rule('required|string|min:10')]
    public $location;
    #[Rule('required|max:500')]
    public $content;
    #[Rule('required|string')]
    public $date;
    #[Rule('required|string')]
    public $time;

    #[Rule('required|mimes:png,jpeg,jpg|max:5000')]
    public $image;

    use WithFileUploads;

    public function render()
    {
        return view('livewire.admin.event.admin-event-create')->layout('layouts.admin-app')->layoutData([
            'title' => 'Event || Menoman Care Foundation',
        ]);
    }

    public function store()
    {
        
        $validated = $this->validate();
        // if($this->image){
            // $image = Image::make($this->image);
            // $image->crop(300,200);
        $image = $this->image->store('public/events');
        // }
        $uid = Str::uuid();

        $event = Event::create([
            'title' => $this->title,
            'location' => $this->location,
            'content' => $this->content,
            'date' => $this->date,
            'time' => $this->time,
            'image' => $image,
        ]);
        $this->reset();
        session()->flash('success', 'Event Successfully created');

        return redirect(route('admin_event'));
    }
}