<?php

namespace App\Livewire\Frontend\Includes;

use App\Models\Newsletter;
use Livewire\Component;

class Footer extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.frontend.includes.footer');
    }

    public function store(){
        $validated = $this->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);
        Newsletter::create([
            'email' => $this->email,
        ]);
        session()->flash('success', 'Your Email is Received');
        $this->reset();
        return redirect()->back();

    }
}
