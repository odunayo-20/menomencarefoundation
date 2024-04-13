<?php

namespace App\Livewire\Admin\Donate;

use App\Models\Donate;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDonate extends Component
{
    #[Url(  history:true   )]
    public $search = '';
    public $pagination = 10;

    public $donate_id;
    use WithPagination;
    public function render()
    {
        if(!$this->search){
            $donates = Donate::latest()->paginate($this->pagination);
        }else{
            $donates = Donate::latest()->where('payer_name','like','%'.$this->search.'%')->orWhere('payer_email', 'like','%'.$this->search.'%')->orWhere('amount', 'like','%'.$this->search.'%')->orWhere('created_at', 'like','%'.$this->search.'%')->paginate($this->pagination);
        }
        return view('livewire.admin.donate.admin-donate', compact('donates'))->layout('layouts.admin-app')->layoutData([
            'title' => 'Donate || Menoman Care Foundation'
        ]);;
    }

public function updatedSearch(){
    $this->resetPage();
}

    

public function delete($donate_id){
    $this->donate_id = $donate_id;
}


public function destroy(){
    $donate = Donate::findOrFail($this->donate_id)->delete();
    session()->flash('success', 'Donate Record Deleted Successfully');
    $this->dispatch('close-modal');
}
}