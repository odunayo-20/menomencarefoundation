<?php

namespace App\Livewire\Admin\Report;

use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminReportEdit extends Component
{
    use WithFileUploads;

    #[Rule('required|min:4')]
    public $title;
    #[Rule('required|min:4|max:400')]
    public $summary;
    #[Rule('required|string')]
    public $date;
    #[Rule('required|mimes:docx,pdf,txt|max:5000')]
    public $new_file;
    public $report;
    public $old_file;


  public function mount(Report $report){
    $report = $report;
    $this->title = $report->title;
    $this->date = $report->date;
    $this->summary = $report->summary;
    $this->old_file = $report->file;
  }

    public function updateReport()
    {
        if($this->new_file){
            $this->validate();
        }
        $document = $this->report->file;
        if($this->new_file){
            Storage::delete($this->old_file);
        $document = $this->new_file->store('public/reports');
        }
        $this->report->update([
            'title' => $this->title,
            'summary' => $this->summary,
            'date' => $this->date,
            'file' => $document,
        ]);
        
        $this->reset();
        session()->flash('success', 'Report Successfully created');

        return redirect(route('admin_report'));
    }


        public function render()
    {
        return view('livewire.admin.report.admin-report-edit')->layout('layouts.admin-app')->layoutData([
            'title'=> 'Report || Menoman Care Foundation'
        ]);
    }



}