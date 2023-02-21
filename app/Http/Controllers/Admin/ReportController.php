<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;

class ReportController extends Controller
{
    private $report;
    private $dateAndTime;
    private $extension;
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
        return view('admin.reports.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {


        $request->file->move(public_path('reports_uploads'), $fileName);

        Report::create($request->all());

        if($request->has("file")) {
            $reportFile = $request->file("file");
            $path = $this->storeFileOnDisk($reportFile);

            $fileName = time().'.'.$request->file->extension();  

            $this->createRelation($path);
        }

        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
    }

    private function storeFileOnDisk($reportFile) {
        $this->dateAndTime = now()->format("Y-m-d_hmsu");
        $this->extension =  $reportFile->guessClientExtension();

        // $path = $this->storeFileOnDisk($reportFile);

        $path = $reportFile->storeAs("somewhere",
        "{$this->report->name}_{$this->report->user->name}_{$this->dateAndTime}.{$this->extension}");


        return $path;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
