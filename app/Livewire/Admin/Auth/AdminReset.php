<?php

namespace App\Livewire\Admin\Auth;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AdminReset extends Component
{
    public $email;

    public $token;
#[Rule('required|min:5|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/|')]
    public $password;
#[Rule('required|same:password|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/')]
    public $confirm_password;

    public function mount($token, $email)
    {
        $admin = Admin::where('email', $email)->where('token', $token)->first();
        if (! $admin) {
            session()->flash('error', 'Invalid Email or Token');

            return redirect(route('admin_login'));
        }
    }

    public function render()
    {
        $admin = Admin::where('email', $this->email)->where('token', $this->token)->first();

        return view('livewire.admin.auth.admin-reset', compact('admin'))->layout('layouts.login-app')->layoutData([
            'title' => 'Reset-Password || Menoman Care Foundation',
        ]);
    }

    public function resetPassword()
    {
        // $this->validate([
        //     'password' => 'required',
        //     'confirm_password' => 'required|same:password',
        // ]);
        $this->validate();

        $admin = Admin::where('email', $this->email)->where('token', $this->token)->first();
        $admin->token = ' ';
        $admin->password = Hash::make($this->password);
        $admin->update();
        session()->flash('success', 'Password Successfully reset');

        return redirect(route('admin_login'));
    }
}