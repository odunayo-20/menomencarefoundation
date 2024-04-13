<?php

namespace App\Livewire\Admin\Report;

use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class AdminReport extends Component
{
    use WithPagination;

    public $report_id;

    public function render()
    {
        $reports = Report::latest()->paginate(10);

        return view('livewire.admin.report.admin-report', compact(['reports']))->layout('layouts.admin-app')->layoutData([
            'title' => 'Report || Menoman Care Foundation',
        ]);
    }

    public function downloadFile(Report $report)
    {
        $string = Str::uuid();
        if (Storage::disk('local')->exists($report->file)) {
            session()->flash('success', 'File downloading');

            return Storage::download($report->file, $string);
        } else {
            session()->flash('error', 'File download not found');
        }
    }

    public function delete($report_id)
    {
        $this->report_id = $report_id;
    }

    public function destroy()
    {
        $report = Report::findOrFail($this->report_id);
        $report->delete();
        Storage::delete($report->file);
        $report->delete();
        session()->flash('success', 'Report Successfully Deleted');
        $this->dispatch('close-modal');
    }

    public function updateStatus($reportId, $newStatus)
    {
        $report = Report::find($reportId);
        $report->update(['status' => $newStatus]);

        return redirect()->back();
    }
}
