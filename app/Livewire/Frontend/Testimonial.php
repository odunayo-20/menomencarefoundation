<?php

namespace App\Livewire\Frontend;

use App\Models\Testimonial as ModelsTestimonial;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Testimonial extends Component
{
    #[Rule('required|min:4')]
    public $name;
    #[Rule('required|min:4|max:400')]
    public $message;
    #[Rule('required|min:4')]
    public $profession;
    public $image;

    use WithFileUploads;
    use WithPagination;


    // public $testimonial = [];
    
    public function render()
    {
        $testimonial = ModelsTestimonial::latest()->where('status', 'Active')->where('video',false)->paginate(4);
        return view('livewire.frontend.testimonial', compact(['testimonial']))->layout('layouts.frontend-app')->layoutData([
            'title' => 'Testimonial || Menoman Care Foundation',
        ]);
    }

    // public function mount(){
    //     $this->testimonial = ModelsTestimonial::latest()->where('status', 'Active')->where('video',false)->get();
    // }

    public function store()
    {
        $this->validate();
        $testimonial = ModelsTestimonial::create([
            'name' => $this->name,
            'profession' => $this->profession,
            'content' => $this->message,
            'status' => 1,
        ]);
        $this->reset();
        session()->flash('success', 'Testimonial Successfully created');

        return redirect(route('testimonial'));
    }

}