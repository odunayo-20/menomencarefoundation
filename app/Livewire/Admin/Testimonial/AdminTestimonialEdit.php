<?php

namespace App\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminTestimonialEdit extends Component
{
    use WithFileUploads;

    public $old_video;

    public $testimonial;

    #[Rule('required|min:4')]
    public $name;

    #[Rule('required|min:4|max:400')]
    public $content;

    #[Rule('required|min:4')]
    public $profession;

    #[Rule('mimes:mp4,mov,ogg|max:35248')]
    public $new_video;

    public function render()
    {
        return view('livewire.admin.testimonial.admin-testimonial-edit')->layout('layouts.admin-app')->layoutData([
            'title' => 'Testimonial || Menoman Care Foundation',
        ]);
    }

    public function mount(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
        $this->name = $testimonial->name;
        $this->profession = $testimonial->profession;
        $this->content = $testimonial->content;
        $this->old_video = $testimonial->video;
    }

    public function store()
    {
        if ($this->new_video) {
            $this->validate();
        }

        $image = $this->testimonial->video;
        if ($this->new_video) {
            if($this->testimonial->video){

                Storage::delete($this->old_video);
            }

            $image = $this->new_video->store('public/testimonials');
        }

        $this->testimonial->update([
            'name' => $this->name,
            'profession' => $this->profession,
            'content' => $this->content,
            'video' => $image,
        ]);
        $this->reset();
        session()->flash('success', 'Testimonial Successfully Updated');

        return redirect(route('admin_testimonial'));
    }
}