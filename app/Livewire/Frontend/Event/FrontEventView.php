<?php

namespace App\Livewire\Frontend\Event;

use App\Models\Event;
use App\Models\EventUpload;
use Livewire\Component;

class FrontEventView extends Component
{
    public $event = [];
    public $imageUpload = [];


    public function render()
    {
        return view('livewire.frontend.event.front-event-view')->layout('layouts.frontend-app')->layoutData([
            'title' => 'Event || Menoman Care Foundation',
        ]);
    }



public function mount(Event $event){
    $this->event = $event;
    $this->imageUpload = EventUpload::with('event')->where('event_id', $event->id)->get();
}

}