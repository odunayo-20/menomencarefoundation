<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use App\Models\EventUpload;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminEventView extends Component
{
    public $event = [];
    public $imageUpload = [];
    
    public function render()
    {
        return view('livewire.admin.event.admin-event-view')->layout('layouts.admin-app')->layoutData([
            'title' => 'Event || Menoman Care Foundation'
        ]);
    }

    public function mount(Event $event){
        $this->event = $event;
        $this->imageUpload = EventUpload::with('event')->where('event_id', $event->id)->get();
    }

    public function delete(EventUpload $gallery)
    {
        $gallery = $gallery;
        $gallery->delete();
        Storage::delete($gallery->images);
        $gallery->delete();
        session()->flash('success', 'Image Successfully Deleted');

        return redirect()->route('admin_event_view', ['event'=>$this->event]);
    }



}