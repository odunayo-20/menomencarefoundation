<?php

namespace App\Livewire\Admin\Testimonial;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AdminTestimonial extends Component
{
    use WithPagination;
    #[Url(history: true)]
    public $search = '';
    public $pagination = 10;

    public $testimonial_id;
    
    public function render()
    {
        if (!$this->search) {
            # code...
            $testimonials = Testimonial::latest()->paginate($this->pagination);
        } else {
            # code...
            $testimonials = Testimonial::latest()->where('name', 'like', '%' . $this->search . '%')->orWhere('profession', 'like', '%' . $this->search . '%')->orWhere('status', 'like', '%' . $this->search . '%')->orWhere('created_at', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        }

        return view('livewire.admin.testimonial.admin-testimonial', compact('testimonials'))->layout('layouts.admin-app')->layoutData([
            'title' => 'Testimonial || Menoman Care Foundation'
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    // public function delete(Testimonial $testimonial)
    // {
    //     $testimonial  = $testimonial;
    //     $testimonial->delete();
    //     if($testimonial->video){

    //         Storage::delete($testimonial->video);
    //     }
    //     $testimonial->delete();
    //     session()->flash('success', 'Testimonial Successfully Deleted');
    //     return redirect()->back();
    // }

    

    public function delete($testimonial_id)
    {
        $this->testimonial_id = $testimonial_id;
    }

    public function destroy()
    {
        $testimonial = Testimonial::findOrFail($this->testimonial_id);
        $testimonial->delete();
        Storage::delete($testimonial->video);
        $testimonial->delete();
        session()->flash('success', 'Testimonial Successfully Deleted');
        $this->dispatch('close-modal');
    }

    public function updateStatus($testimonialId, $newStatus)
    {
        $testimonial = Testimonial::find($testimonialId);
        $testimonial->update(['status' => $newStatus]);
        return redirect()->back();
    }
}