<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AdminEvent extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    public $pagination = 10;

    public $event_id;

    public function render()
    {
        if (! $this->search) {

            $events = Event::latest()->paginate($this->pagination);
        } else {
            $events = Event::latest()->where('title', 'like', '%'.$this->search.'%')->orwhere('status', 'like', '%'.$this->search.'%')->orwhere('created_at', 'like', '%'.$this->search.'%')->paginate($this->pagination);

        }

        return view('livewire.admin.event.admin-event', compact('events'))->layout('layouts.admin-app')->layoutData([
            'title' => 'Event || Menoman Care Foundation',
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($event_id)
    {
        $this->event_id = $event_id;
    }

    public function destroy()
    {
        $event = Event::findOrFail($this->event_id);
        $event->delete();
        Storage::delete($event->image);
        $event->delete();
        session()->flash('success', 'Event Successfully Deleted');
        $this->dispatch('close-modal');
    }

    public function updateStatus($eventId, $newStatus)
    {
        $event = Event::find($eventId);
        $event->update(['status' => $newStatus]);

        return redirect()->back();
    }
}
