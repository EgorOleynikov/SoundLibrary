<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Subject;
use App\Models\User;
use App\Models\Sounds;

class ReportsController extends Controller
{
    public function index() {
      $reports = Report::get();
      foreach ($reports as $report) {
        $report->sound_name = Sounds::where("id", $report->sound_id)->firstOrFail()->name;
        $report->subject_name = Subject::where("id", $report->subject_id)->firstOrFail()->subject;
      }
      return view('admin.reports', [
        'reports' => $reports
      ]);
    }

    public function destroy(Request $request) {
      if ($request->ajax()) {
        $report = Report::where("id", $request->report_id);
        $report->delete();
        return "success";
      }
    }
}
