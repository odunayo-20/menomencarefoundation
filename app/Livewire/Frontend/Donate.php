<?php

namespace App\Livewire\Frontend;

use App\Mail\SendDonateMail;
use App\Models\Donate as ModelsDonate;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Donate extends Component
{
    public $fullname;

    public $email;

    public $address;

    public $phone;

    public $amount;

   
   
    public function store()
    {
        $validated = $this->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'amount' => 'required|numeric',

        ]);

        // ModelsDonate::create($validated);
        $donate = new ModelsDonate();
        $donate->fullname = $this->fullname;
        $donate->email = $this->email;
        $donate->address = $this->address;
        $donate->phone = $this->phone;
        $donate->save();

        $message = 'Please donate to this account below';
        $subject = "Donation by $this->fullname";
        $accountNumber = '0058227818';
        $accountName = 'MENOMAN CARE FOUNDATION';
        $bankName = 'Stabic IBTC Bank';
        $thanks = "Thanks, we appreciate your donation";
        $maildata = [
            'fullname' => $this->fullname,
            'email' => $this->email,
            'amount' => $this->amount,
            'message' => $message,
            'accountNumber' => $accountNumber,
            'accountName' => $accountName,
            'bankName' => $bankName,
            'thanks' => $thanks,
        ];

      

        Mail::to($this->email)->send(new SendDonateMail($subject, $maildata));
        session()->flash('success', 'Please check your email for the account details');

        return redirect(route('donate'));

    }

    public function render()
    {
        return view('livewire.frontend.donate')->layout('layouts.frontend-app')->layoutData([
            'title' => 'Donate || Menoman Care Foundation',
        ]);
    }

}