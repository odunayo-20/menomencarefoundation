<?php

namespace App\Livewire\Admin\Membership;

use App\Models\Membership;
use Livewire\Component;

class AdminMembershipEdit extends Component
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

    public $membership;

    public function mount(Membership $membership)
    {
        $this->membership = $membership;
        $this->first_name = $membership->first_name;
        $this->last_name = $membership->last_name;
        $this->other_name = $membership->other_name;
        $this->date_of_birth = $membership->date_of_birth;
        $this->state = $membership->state;
        $this->email = $membership->email;
        $this->phone = $membership->phone;
        $this->address = $membership->address;
        $this->employment_status = $membership->employ_status;
        $this->education_qualification = $membership->edu_qualification;
        $this->organization_name = $membership->organization_name;
        $this->organization_address = $membership->organization_address;
        $this->membership_category = $membership->membership_category;
        $this->gender = $membership->gender;
    }

    public function store()
    {
        $validated = $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'state' => 'required|string',
            'date_of_birth' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string|numeric',
            'address' => 'required|string',
            'employment_status' => 'required|string',
            'education_qualification' => 'required|string',
            'employment_status' => 'required|string',
            'membership_category' => 'required|string',
            'gender' => 'required|string',
        ]);

        // Volunteer::create($validated);

        $this->membership->update([
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
        session()->flash('success', 'Memberships Record Successfully Updated');
        $this->reset();

        return redirect(route('admin_membership'));
    }

    public function render()
    {
        return view('livewire.admin.membership.admin-membership-edit')->layout('layouts.admin-app')->layoutData([
            'title' => 'Membership || Menoman Care Foundation',
        ]);
    }
}
