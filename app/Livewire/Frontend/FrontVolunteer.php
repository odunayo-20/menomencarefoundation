<?php

namespace App\Livewire\Frontend;

use App\Models\Volunteer;
use Livewire\Component;

class FrontVolunteer extends Component
{
    public $designation;
    public $name;
    public $state;
    public $date_of_birth;
    public $email;
    public $phone;
    public $address;
    public $position;
    public $organisation;
    public $program;
    public $activities;
    public $gender;

    public function render()
    {
        return view('livewire.frontend.front-volunteer')->layout('layouts.frontend-app')->layoutData([
            'title' => 'Volunteers || Menoman Care Foundation',
        ]);
    }

    public function store(){
$validated = $this->validate([
'designation' => 'required|string',
'name' => 'required|string',
'state' => 'required|string',
'date_of_birth' => 'required|string',
'email' => 'required|string|email|unique:volunteers,email,except,id',
'phone' => 'required|string|numeric',
'address' => 'required|string',
'position' => 'required|string',
'organisation' => 'required|string',
'program' => 'required|string',
'activities' => 'required|string',
'gender' => 'required|string',
]);

// Volunteer::create($validated);

Volunteer::create([
    'designation' => $this->designation,
    'name' => $this->name,
    'state' => $this->state,
    'date_of_birth' => $this->date_of_birth,
    'email' => $this->email,
    'phone' => $this->phone,
    'address' => $this->address,
    'position' => $this->position,
    'organisation' => $this->organisation,
    'program' => $this->program,
    'activities' => $this->activities,
    'gender' => $this->gender,
    'status' => 1
]);
session()->flash('success', 'Volunteer Record Successfully Created');
return redirect(route('volunteers'));
    }
}
