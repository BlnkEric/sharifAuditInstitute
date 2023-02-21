<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportFileAccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function downloadReportFile(Request $request, Report $report) {

        $reportFile = $report->reportFile()->first();
        $reportPath = $reportFile->path;

        $downloadName = $report->user->name . " - " . $report->name . "." . $reportFile->extension;
        return Storage::download($reportPath, $downloadName);
    }
}
