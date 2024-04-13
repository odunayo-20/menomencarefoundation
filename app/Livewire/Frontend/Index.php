<?php

namespace App\Livewire\Frontend;

use App\Models\Contact;
use App\Models\Event;
use App\Models\Report;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{
    public $events = [];
    public $teams = [];
    public $testimonial = [];
    public $report = [];
    public $lastestEvents = [];
    #[Rule('required|string|min:5')]
    public $name;

    #[Rule('required|email|min:5')]
    public $email;

    #[Rule('required|string|min:5')]
    public $subject;

    #[Rule('required|string|min:10')]
    public $message;

    public function render()
    {
        return view('livewire.frontend.index')->layout('layouts.frontend-app')->layoutData([
            'title' => 'Home || Menoman Care Foundation',
        ]);
    }

    public function mount(){
        $this->lastestEvents = Event::latest()->limit(4)->where('date', '>=', now())->where('status', 'Active')->get();
        $this->teams = Team::latest()->where('status', 'Active')->get();
        $this->testimonial = Testimonial::latest()->where('status', 'Active')->where('video',null)->get();
        $this->report = Report::latest()->limit(3)->where('status', 'Active')->get();

    }

public function downloadFile(Report $report){
    $string = Str::uuid();
    if(Storage::disk('local')->exists($report->file)){
        session()->flash('success', 'File is Downloading');
        return Storage::download($report->file, $string);
    }else{
        session()->flash('error', 'File Not Found');
    }
}

    public function store(){

  $validated = $this->validate();
         Contact::create($validated);
         session()->flash('success', 'Details Successfully Submitted');
         return redirect(route('index'));
      }

      

}