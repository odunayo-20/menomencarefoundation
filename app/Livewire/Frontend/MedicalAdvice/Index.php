<?php

namespace App\Livewire\Frontend\MedicalAdvice;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MedicalAdvice;

class Index extends Component
{

    use WithPagination;

    public $search = '';
    public $perPage = 9;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $advices = MedicalAdvice::query()
            ->where('status', true)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('content', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.frontend.medical-advice.index', [
            'advices' => $advices
        ])->layout('layouts.frontend-app')->layoutData([
            'title' => 'Medical Advice || Menoman Care Foundation',
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.frontend.medical-advice.index')->layout('layouts.frontend-app')->layoutData([
    //         'title' => 'Medical Advice || Menoman Care Foundation',
    //     ]);
    // }


}
