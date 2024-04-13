<?php

namespace App\Livewire\Admin\Report;

use App\Models\Report;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminReportCreate extends Component
{
    use WithFileUploads;

    #[Rule('required|min:4|max:200')]
    public $title;
    #[Rule('required|min:4|max:400')]
    public $summary;
    #[Rule('required|mimes:doc,docx,pdf,txt|max:5000')]
    public $file;
    #[Rule('required|string')]
    public $date;


    public function store()
    {
        $this->validate();
        if($this->file){
        $image = $this->file->store('public/reports');
        }
        $report = Report::create([
            'title' => $this->title,
            'summary' => $this->summary,
            'date' => $this->date,
            'file' => $image,
        ]);
        $this->reset();
        session()->flash('success', 'Report Successfully created');

        return redirect(route('admin_report'));
    }


    
    public function render()
    {
        return view('livewire.admin.report.admin-report-create')->layout('layouts.admin-app')->layoutData([
            'title'=> 'Report || Menoman Care Foundation'
        ]);
    }
}