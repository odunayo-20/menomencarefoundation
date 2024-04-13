<?php

namespace App\Livewire\Admin\Membership;

use App\Models\Membership;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminMembershipCreate extends Component
{
    public $first_name;

    public $other_name;

    public $last_name;

    public $state;

    public $date_of_birth;

    public $email;

    public $phone;

    public $address;

    public $employment_status;

    public $education_qualification;

    public $membership_qualification;

    public $organization_name;

    public $organization_address;

    public $membership_category;

    public $gender;

    public function store()
    {
        $validated = $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'state' => 'required|string',
            'date_of_birth' => 'required|string',
            'email' => 'required|string|email|unique:memberships,email',
            'phone' => 'required|string|numeric',
            'address' => 'required|string',
            'employment_status' => 'required|string',
            'education_qualification' => 'required|string',
            'employment_status' => 'required|string',
            'membership_category' => 'required|string',
            'gender' => 'required|string',
        ]);

        // Volunteer::create($validated);

        Membership::create([
            'first_name' => $this->first_name,
            'other_name' => $this->other_name,
            'last_name' => $this->last_name,
            'state' => $this->state,
            'date_of_birth' => $this->date_of_birth,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'employ_status' => $this->employment_status,
            'edu_qualification' => $this->education_qualification,
            'organization_name' => $this->organization_name,
            'organization_address' => $this->organization_address,
            'membership_category' => $this->membership_category,
            'gender' => $this->gender,

        ]);
        session()->flash('success', 'Memberships Record Successfully Created');

        return redirect(route('admin_membership'));
    }






    
    public function render()
    {
        return view('livewire.admin.membership.admin-membership-create')->layout('layouts.admin-app')->layoutData([
            'title'=> 'Membership || Menoman Care Foundation'
        ]);
    }



}