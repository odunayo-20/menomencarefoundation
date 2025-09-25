<?php

namespace App\Livewire\Admin\MedicalAdvice;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\MedicalAdvice;
use Livewire\Attributes\Validate;

class Create extends Component
{


     #[Validate('required|string|max:255')]
    public $title;

    #[Validate('nullable|string')]
    public $content;
    #[Validate('boolean')]
    public $status = true;

    public function store()
    {
        $this->validate();



        MedicalAdvice::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
             'status' => $this->status,
        ]);

        session()->flash('success', 'Medical advice created successfully!');
        $this->reset();
        return redirect()->route('admin_medical_advice');
    }



    public function render()
    {
        return view('livewire.admin.medical-advice.create')->layout('layouts.admin-app')->layoutData([
            'title' => 'Create Medical Advice || Menoman Care Foundation',
        ]);
    }
}
