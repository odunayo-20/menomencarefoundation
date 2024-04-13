<?php

namespace App\Livewire\Admin\Volunteer;

use App\Models\Volunteer;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AdminVolunteer extends Component
{
    use WithPagination;
    #[Url(history:true)]
    public $search = "";
    public $pagination = 10;

    public $volunteer_id;
    
    public function render()
    {
        if(!$this->search){

            $volunteers = Volunteer::latest()->paginate($this->pagination);
        }else{
            $volunteers = Volunteer::latest()->where('email', 'like', '%'.$this->search .'%')->orWhere('name', 'like', '%' . $this->search . '%')->orWhere('designation', 'like', '%' . $this->search .'%')->paginate($this->pagination);
        }
        return view('livewire.admin.volunteer.admin-volunteer', compact(['volunteers']))->layout('layouts.admin-app')->layoutData([
            'title'=> 'Volunteers || Menoman Care Foundation'
        ]);
    }

    public function updateSearch(){
        $this->resetPage();
    }

    public function delete($volunteer_id)
    {

        $this->volunteer_id = $volunteer_id;
    }

    public function destroy()
    {
        $volunteer = Volunteer::findOrFail($this->volunteer_id)->delete();

        session()->flash('success', 'Volunteer Successfully Deleted');
        $this->dispatch('close-modal');

    }

    public function updateStatus($volunteerId, $newStatus)
    {
        $volunteer = Volunteer::find($volunteerId);
        $volunteer->update(['status' => $newStatus]);
        return redirect()->back();
    }

}