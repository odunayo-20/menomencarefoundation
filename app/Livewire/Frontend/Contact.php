<?php

namespace App\Livewire\Frontend;

use App\Mail\SendContactMail;
use Livewire\Component;
use App\Mail\SendDemoMail;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact as ModelsContact;

class Contact extends Component
{
    #[Rule('required|string|min:5')]
    public $name;

    #[Rule('required|email|min:5')]
    public $email;

    #[Rule('required|string|min:5')]
    public $subject;

    #[Rule('required|string|min:10')]
    public $message;

    public $admin_email = 'info@menomancarefoundation.org';

    public function render()
    {
        return view('livewire.frontend.contact')->layout('layouts.frontend-app')->layoutData([
            'title' => 'Contact || Menoman Care Foundation',
        ]);
    }

    public function store()
    {

        $validated = $this->validate();

        ModelsContact::create($validated);

        $message = $this->message;

        $maildata = [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $message,
        ];


        Mail::to($this->admin_email)->send(new SendContactMail( $maildata, $this->subject));
        session()->flash('success', 'Details Successfully Submitted');


       return redirect(route('contact'));
    }
}