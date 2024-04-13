<?php

namespace App\Livewire\Admin\Auth;

use App\Mail\SendDemoMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AdminForget extends Component
{
    #[Rule('required|email|min:5')]
public $email;
    public function render()
    {
        return view('livewire.admin.auth.admin-forget')->layout('layouts.login-app')->layoutData([
            'title' => 'Forget || Menoman Care Foundation',
        ]);
    }

    public function store(){
        $this->validate();
        $admin = Admin::where('email', $this->email)->first();
        if(!$admin){
            session()->flash('error', 'Email not found');
            return redirect(route('admin_forget'));
        }

        $token = Hash('sha256', time());
        $admin->token = $token;
        $admin->update();

        $reset_link = url('admin/reset/password/'.$token.'/'.$this->email);
        $subject = "Reset Your Password";
        $message = "Please Click below to reset your password";
        // $message .= "<a href='$reset_link'>Click Me</a>";


        $maildata = [
            'title' => 'Password Reset',
            'url' => $reset_link,
            'message' => $message,
        ];


        Mail::to($this->email)->send(new SendDemoMail( $maildata, $subject));
        session()->flash('success', 'Please check your email');
       return redirect(route('admin_forget'));

    }
}