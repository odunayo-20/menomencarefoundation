<?php

namespace App\Livewire\Frontend\MedicalAdvice;

use App\Models\MedicalAdvice;
use Livewire\Component;

class View extends Component
{

    public $advice, $recentAdvices;
    public function mount($advice)
    {
        $this->advice = MedicalAdvice::where('slug', $advice)->where('status', true)->firstOrFail();

        $this->recentAdvices = MedicalAdvice::where('status', true)
            ->where('id', '!=', $this->advice->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }


    public function render()
    {
        return view('livewire.frontend.medical-advice.view')->layout('layouts.frontend-app')->layoutData([
            'title' => 'Medical Advice || Menoman Care Foundation',
        ]);
    }
}
