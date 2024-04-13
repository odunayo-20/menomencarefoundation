<?php

namespace App\Livewire\Admin\Team;

use App\Models\Team;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminTeamCreate extends Component
{
    use WithFileUploads;

    #[Rule('required|string')]
    public $position;

    #[Rule('required|string|min:4')]
    public $name;
    #[Rule('required|string|min:4')]

    public $profession;

    #[Rule('required|mimes:png,jpeg,jpg|max:5000')]

    public $image;

    public function render()
    {
        return view('livewire.admin.team.admin-team-create')->layout('layouts.admin-app')->layoutData([
            'title' => 'Team || MENo~MAN',
        ]);
    }

   
    
    public function store()
    {

        $this->validate();

        // if($this->image){
        $image = $this->image->store('public/teams');
        // }
        $testimonial = Team::create([
            'name' => $this->name,
            'profession' => $this->profession,
            'position' => $this->position,
            'image' => $image,
        ]);
        $this->reset();
        session()->flash('success', 'Team Successfully created');

        return redirect(route('admin_team'));
    }
}