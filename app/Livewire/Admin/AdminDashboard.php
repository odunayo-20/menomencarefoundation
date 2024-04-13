<?php

namespace App\Livewire\Admin;

use App\Models\Contact;
use App\Models\Donate;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Membership;
use App\Models\Newsletter;
use App\Models\Report;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Volunteer;
use Livewire\Component;
use Livewire\WithPagination;
use Coduo\PHPHumanizer\NumberHumanizer;

class AdminDashboard extends Component
{
    use WithPagination;
    public $contact,$team,$testimonial,$event,$donate;
    public $subscriptions;
    public $membership;
    public $volunteer;
    public $report;
    public $gallery;
    public $newsletter;
    public function render()
    {

        $donates = Donate::latest()->paginate(5);
        return view('livewire.admin.admin-dashboard', compact(['donates']))->layout('layouts.admin-app')->layoutData([
            'title' => 'Dashboard || Menoman Care Foundation'
        ]);
    }


    public function mount(){
        $this->event = Event::get();
        $this->contact = Contact::get();
        $this->team = Team::get();
        $this->testimonial = Testimonial::get();
        $this->donate = Donate::get();
        $this->membership = Membership::get();
        $this->volunteer = Volunteer::get();
        $this->report = Report::get();
        $this->gallery = Gallery::get();
        $this->newsletter = Newsletter::get();

        $this->subscriptions= [
            ['Day'=>'Newsletter', 'Value'=>count($this->newsletter)],
            ['Day'=>'Contact', 'Value'=>count($this->contact)],
            ['Day'=>'Event', 'Value'=>count($this->event)],
            ['Day'=>'Team', 'Value'=>count($this->team)],
            ['Day'=>'Testimonial', 'Value'=>count($this->testimonial)],
            ['Day'=>'Volunteer', 'Value'=>count($this->volunteer)],
            ['Day'=>'Membership', 'Value'=>count($this->membership)],
            ['Day'=>'Report', 'Value'=>count($this->report)],
            ['Day'=>'Gallery', 'Value'=>count($this->gallery)],
                ];
    }
}