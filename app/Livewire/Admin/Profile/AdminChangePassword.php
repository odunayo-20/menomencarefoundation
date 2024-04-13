<?php

namespace App\Livewire\Admin\Profile;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AdminChangePassword extends Component
{
    #[Rule('required|min:5|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/')]
    public $password;

    #[Rule('required|same:password|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/')]
    public $confirm_password;
#[Rule('required|string')]
    public $old_password;

    public function render()
    {
        return view('livewire.admin.profile.admin-change-password')->layout('layouts.admin-app')->layoutData([
            'title' => 'Update Password || Menoman Care Foundation',
        ]);
    }

    public function store()
    {
        $this->validate();

        $currentPassword = Hash::check($this->old_password, Auth::guard('admin')->user()->password);

        if ($currentPassword) {
            Admin::findOrFail(Auth::guard('admin')->user()->id)->update([
                'password' => Hash::make($this->password),
            ]);
            session()->flash('success', 'Admin Password Successfully Updated');
            $this->reset();

            return redirect()->back();
        } else {
            $this->reset();
            return redirect()->back()->with('error', 'New Password does not match with Old Password');

        }

    }
}