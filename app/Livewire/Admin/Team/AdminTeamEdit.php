<?php

namespace App\Livewire\Admin\Team;

use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminTeamEdit extends Component
{
    use WithFileUploads;

    #[Rule('required|string')]
    public $position;

    #[Rule('required|string|min:4')]
    public $name;

    #[Rule('required|string|min:4')]
    public $profession;

    public $team;

    #[Rule('required|mimes:png,jpeg,jpg|max:5000')]
    public $new_image;

    public $old_image;

    public function render()
    {
        return view('livewire.admin.team.admin-team-edit')->layout('layouts.admin-app')->layoutData([
            'title' => 'Team || MENo~MAN',
        ]);
    }

    public function mount(Team $team)
    {
        $this->team = $team;
        $this->name = $team->name;
        $this->old_image = $team->image;
        $this->profession = $team->profession;
        $this->position = $team->position;
    }

    public function store()
    {

        if ($this->new_image) {
            $this->validate();
        }
        $image = $this->team->image;
        if ($this->new_image) {
            Storage::delete($this->old_image);

            $image = $this->new_image->store('public/teams');
        }
        $this->team->update([
            'name' => $this->name,
            'profession' => $this->profession,
            'position' => $this->position,
            'image' => $image,
        ]);
        $this->reset();
        session()->flash('success', 'Team Successfully Updated');

        return redirect(route('admin_team'));
    }
}