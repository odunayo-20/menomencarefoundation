<?php

namespace App\Livewire\Admin\Volunteer;

use App\Models\Volunteer;
use Livewire\Component;

class AdminVolunteerCreate extends Component
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
    public $volunteer;

    public function render()
    {
        return view('livewire.admin.volunteer.admin-volunteer-create')->layout('layouts.admin-app')->layoutData([
            'title' => 'Volunteers || Menoman Care Foundation'
        ]);
    }

    public function store()
    {
        // dd('do ');
        $validated = $this->validate([
            'designation' => 'required|string',
            'name' => 'required|string',
            'state' => 'required|string',
            'date_of_birth' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string|numeric',
            'address' => 'required|string',
            'position' => 'required|string',
            'organisation' => 'required|string',
            'program' => 'required|string',
            'activities' => 'required|string',
            'gender' => 'required|string',
        ]);

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
            'gender' => $this->gender
        ]);
        session()->flash('success', 'Volunteer Record Successfully Created');
        return redirect(route('admin_volunteer'));
    }
}
