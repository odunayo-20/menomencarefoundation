<?php

namespace App\Livewire\Admin\MedicalAdvice;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\MedicalAdvice;

class Index extends Component
{

    use WithPagination;

    #[Url]
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDir = 'desc';
    public $perPage = 10;

    public $advice_id;

    protected $paginationTheme = 'bootstrap';


    public function delete($id)
    {
        $this->advice_id = $id;
    }

    public function destroy()
    {
        MedicalAdvice::find($this->advice_id)->delete();
        session()->flash('success', 'Medical advice deleted successfully!');
        $this->dispatch('close-modal');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleStatus($id)
    {
        $advice = MedicalAdvice::find($id);
        $advice->status = !$advice->status;
        $advice->save();
        session()->flash('success', 'Medical advice status updated successfully!');
    }



    public function render()
    {
        if(! $this->search){
                $advices = MedicalAdvice::latest()->paginate($this->perPage);
            }else{
                $advices = MedicalAdvice::latest()->where('title', 'like', '%'.$this->search.'%')->paginate($this->perPage);
            }
        return view('livewire.admin.medical-advice.index', compact('advices'))->layout('layouts.admin-app')->layoutData([
            'title' => 'Medical Advice || Menoman Care Foundation',
        ]);
    }
}
