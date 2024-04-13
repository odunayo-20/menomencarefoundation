<?php

namespace App\Livewire\Admin\Membership;

use App\Models\Membership;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMembership extends Component
{
    use WithPagination;

    public $pagination = 10;
    #[Url(history:true)]
    public $search = "";
public $isActive = false;
public $membership_id;
    public function render()
    {
        if(! $this->search){

            $membership = Membership::latest()->paginate($this->pagination);
        }else{
            $membership = Membership::latest()->where('first_name', 'like', '%'.$this->search.'%')->orWhere('last_name', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%'.$this->search.'%')->paginate($this->pagination);

        }
        return view('livewire.admin.membership.admin-membership', compact(['membership']))->layout('layouts.admin-app')->layoutData([
            'title'=> 'Membership || Menoman Care Foundation'
        ]);
    }



    public function updatedSearch(){
        $this->resetPage();
    }

  
 

        public function updateStatus($membershipId, $newStatus)
    {
        $membership = Membership::find($membershipId);
        $membership->update(['status' => $newStatus]);

    }


    public function delete($membership_id)
    {
        $this->membership_id = $membership_id;
    }

    public function destroy()
    {
        $membership = Membership::findOrFail($this->membership_id);
        $membership->delete();
        session()->flash('success', 'Membership Successfully Deleted');
        $this->dispatch('close-modal');
    }

}