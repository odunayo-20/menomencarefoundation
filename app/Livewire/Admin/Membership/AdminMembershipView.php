<?php

namespace App\Livewire\Admin\Membership;

use App\Models\Membership;
use Livewire\Component;

class AdminMembershipView extends Component
{
    public $membership = [];

    public function mount(Membership $membership)
    {
        $this->membership = $membership;
    }

    public function render()
    {
        return view('livewire.admin.membership.admin-membership-view')->layout('layouts.admin-app')->layoutData([
            'title' => 'Membership || Menoman Care Foundation',
        ]);
    }
}