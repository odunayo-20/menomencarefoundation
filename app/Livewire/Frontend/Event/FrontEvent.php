<?php

namespace App\Livewire\Frontend\Event;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class FrontEvent extends Component
{
    use WithPagination;
    // public $pastEvents = [];

    // public $latests = [];
    public $past = [];

    public function render()
    {
        $lastestEvents = Event::latest()->where('date', '>=', now())->where('status', 'Active')->paginate(4);
        $pastEvents = Event::latest()->where('date', '<=', now())->where('status', 'Active')->paginate(4);

        return view('livewire.frontend.event.front-event', compact(['lastestEvents', 'pastEvents']))->layout('layouts.frontend-app')->layoutData([
            'title' => 'Event || Menoman Care Foundation',
        ]);
    }

    public function mount()
    {
        // $this->events = Event::latest()->where('status', 'Active')->get();
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $this->past = Event::latest()->where('date', '<', now())->where('status', 'Active')->limit(6)->get();
        // $this->latests = Event::latest()->where('date', '>=', now())->where('status', 'Active')->limit(5)->get();

    }
}