<?php

namespace App\Livewire\Admin\MedicalAdvice;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\MedicalAdvice;
use Livewire\Attributes\Validate;

class Edit extends Component
{

    public MedicalAdvice $advice;

    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('required|string')]
    public $content;



    #[Validate('boolean')]
    public $status = true;

    public $currentImage;

    public function mount(MedicalAdvice $advice)
    {
        $this->advice = $advice;
        $this->title = $advice->title;
        $this->content = $advice->content;
        $this->status = $advice->status == 1 ? true : false;

    }

    public function update()
    {
        $this->validate();

        $this->advice->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
             'status' => $this->status ? 1 : 0,
        ]);

        session()->flash('success', 'Medical advice updated successfully!');
        return redirect()->route('admin_medical_advice');
    }



    public function render()
    {
        return view('livewire.admin.medical-advice.edit')->layout('layouts.admin-app')->layoutData([
            'title' => 'Edit Medical Advice || Menoman Care Foundation',
        ]);
    }
}
