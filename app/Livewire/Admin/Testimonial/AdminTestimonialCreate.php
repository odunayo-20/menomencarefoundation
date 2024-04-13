<?php

namespace App\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminTestimonialCreate extends Component
{
    use WithFileUploads;
    public $name;
    public $content;

    public $profession;

    public $video;

    public function render()
    {
        return view('livewire.admin.testimonial.admin-testimonial-create')->layout('layouts.admin-app')->layoutData([
            'title' => 'Testimonial || Menoman Care Foundation',
        ]);
    }
    public function store()
    {
        $this->validate([
            'profession' => 'required|string',
            'content' => 'required|string',
            'name' => 'required|string',
            'video'=>'required|mimes:mov,mp4,ogg|max:35248'

        ]);
        // if($this->video){
        $videoUploaded = $this->video->store('public/testimonials');
        // }
        $testimonial = Testimonial::create([
            'name' => $this->name,
            'profession' => $this->profession,
            'content' => $this->content,
            'video' => $videoUploaded,
        ]);
        $this->reset();
        session()->flash('success', 'Testimonial Successfully created');

        return redirect(route('admin_testimonial'));
    }
}