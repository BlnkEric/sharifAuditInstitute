<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Report;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::paginate(10);
        return view('admin.reports.index', compact('reports'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('approved_client', '1')->get();

        return view('admin.reports.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $report = $request->all();
        // $report['uuid'] = (string)Uuid::generate();
        $report['uuid'] = (string) Str::uuid();
        if ($request->hasFile('file')) {
            $report['file_path'] = $request->file->getClientOriginalName();
            // $report['file_path'] = time().'.'.$request->file->extension();  
            $request->file->storeAs('reports', $report['file_path']);
        }

        Report::create($report);
        return redirect()->route('admin.reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $users = User::where('approved_client', '1')->get();
        return view('admin.reports.edit', compact('report', 'users'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
            $report['uuid'] = (string) Str::uuid();
            if ($request->hasFile('file')) {
                Storage::delete("reports/".$report->file_path);
                $report['file_path'] = $request->file->getClientOriginalName();
                // $report['file_path'] = time().'.'.$request->file->extension();  
                $request->file->storeAs('reports', $report['file_path']);
            }

            $report->update($request->all());
            return redirect(route('admin.reports.index'))->with('success', "  گزارش با نام: $report->name با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        Storage::delete('logos/');
        
    }
}
