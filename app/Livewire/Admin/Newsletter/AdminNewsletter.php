<?php

namespace App\Livewire\Admin\Newsletter;

use App\Models\Newsletter;
use Livewire\Component;
use Livewire\WithPagination;

class AdminNewsletter extends Component
{
    use WithPagination;
public $search = '';
public $pagination = 10;
public $newsletter_id;


    public function render()
    {
        if(!$this->search){
            
            $newsletter = Newsletter::latest()->paginate($this->pagination);
        }else{
            $newsletter = Newsletter::latest()->where('email', 'like', '%'. $this->search .'%')->paginate($this->pagination);

        }
        return view('livewire.admin.newsletter.admin-newsletter', compact(['newsletter']))->layout('layouts.admin-app')->layoutData([
            'title' => 'Newsletters || Menoman Care Foundation',
        ]);
    }

    
    public function delete($newsletter_id)
    {
        $this->newsletter_id = $newsletter_id;
    }

    public function destroy()
    {
        $newsletter = Newsletter::findOrFail($this->newsletter_id);
        $newsletter->delete();
        session()->flash('success', 'Newsletter Successfully Deleted');
        $this->dispatch('close-modal');
    }
}