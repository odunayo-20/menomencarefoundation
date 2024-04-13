<?php

namespace App\Livewire\Admin\Volunteer;

use App\Models\Volunteer;
use Livewire\Component;

class AdminVolunteerView extends Component
{
    public $volunteer = [];
    public function render()
    {
        return view('livewire.admin.volunteer.admin-volunteer-view')->layout('layouts.admin-app')->layoutData([
            'title' => 'Volunteers || Menoman Care Foundation'
        ]);
    }

    public function mount(Volunteer $volunteer)
    {
        $this->volunteer = $volunteer;
    }
}
