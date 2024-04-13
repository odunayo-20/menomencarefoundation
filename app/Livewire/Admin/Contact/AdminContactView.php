<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;

class AdminContactView extends Component
{
    public $contact;
    public function render()
    {
        return view('livewire.admin.contact.admin-contact-view')->layout('layouts.admin-app')->layoutData([
            'title' => 'Contact || Menoman Care Foundation',
        ]);
    }

    public function mount($contact){
        try {
            //code...
            $this->contact = Contact::findOrFail($contact);
        
        } catch (\Exception $exception) {
            //throw $th;
            return redirect(route('admin_contact'));
        }
        
        
    }
}