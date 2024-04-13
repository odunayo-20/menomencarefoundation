<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AdminContact extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    public $pagination = 10;

    public $contact_id;

    public function render()
    {
        if (! $this->search) {

            $contacts = Contact::latest()->paginate($this->pagination);
        } else {
            $contacts = Contact::latest()->where('name', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%'.$this->search.'%')->orWhere('subject', 'like', '%'.$this->search.'%')->orWhere('created_at', 'like', '%'.$this->search.'%')->paginate($this->pagination);

        }

        return view('livewire.admin.contact.admin-contact', compact('contacts'))->layout('layouts.admin-app')->layoutData([
            'title' => 'Contact || Menoman Care Foundation',
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($contact_id)
    {

        $this->contact_id = $contact_id;
    }

    public function destroy()
    {
        $contact = Contact::findOrFail($this->contact_id)->delete();

        session()->flash('success', 'Contact Successfully Deleted');
        $this->dispatch('close-modal');

    }
}
