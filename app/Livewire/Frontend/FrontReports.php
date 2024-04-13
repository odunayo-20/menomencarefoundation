<?php

namespace App\Livewire\Frontend;

use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class FrontReports extends Component
{
    use WithPagination;

    public function render()
    {
        $report = Report::latest()->where('status', 'Active')->paginate(3);

        return view('livewire.frontend.front-reports', compact(['report']))->layout('layouts.frontend-app')->layoutData([
            'title' => 'Reports || Menoman Care Foundation',
        ]);

    }

    
    public function downloadFile(Report $report){
    $string = Str::uuid();
    if(Storage::disk('local')->exists($report->file)){
        session()->flash('success', 'File Downloading');
        return Storage::download($report->file, $string);
    }else{
        session()->flash('error', 'File Not Found');
    }
}



    
}