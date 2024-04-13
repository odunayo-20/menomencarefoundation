<?php

namespace App\Livewire\Admin\Volunteer;

use App\Models\Volunteer;
use Livewire\Component;

class AdminVolunteerEdit extends Component
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
        return view('livewire.admin.volunteer.admin-volunteer-edit')->layout('layouts.admin-app')->layoutData([
            'title' => 'Volunteers || Menoman Care Foundation'
        ]);
    }

    public function mount(Volunteer $volunteer)
    {
        $this->volunteer = $volunteer;
        $this->designation = $volunteer->designation;
        $this->name = $volunteer->name;
        $this->state = $volunteer->state;
        $this->date_of_birth = $volunteer->date_of_birth;
        $this->email = $volunteer->email;
        $this->position = $volunteer->position;
        $this->organisation = $volunteer->organisation;
        $this->program = $volunteer->program;
        $this->activities = $volunteer->activities;
        $this->gender = $volunteer->gender;
        $this->address = $volunteer->address;
        $this->phone = $volunteer->phone;
    }

    public function updateVolunteer()
    {
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

        $this->volunteer->update([
            'designation' => $this->designation,
            'name' => $this->name,
            'state' => $this->state,
            'date_of_birth' => $this->date_of_birth,
            'email' => $this->email,
            'phone' => $this->phone,
            'position' => $this->position,
            'organisation' => $this->organisation,
            'program' => $this->program,
            'activities' => $this->activities,
            'gender' => $this->gender
        ]);
        session()->flash('success', 'Volunteer Record Successfully Updated');
        return redirect(route('admin_volunteer'));
    }
}
