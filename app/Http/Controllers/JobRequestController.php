<?php

namespace App\Http\Controllers;

use App\Models\JobRequest;
use Illuminate\Support\Str;
use App\Http\Requests\StoreJobRequestRequest;
use App\Http\Requests\UpdateJobRequestRequest;
use App\Models\JobOffer;

class JobRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequestRequest $request, JobOffer $jobOffer)
    {
        $jobRequest = $request->all();
        // $jobRequest['uuid'] = (string)Uuid::generate();
        $jobRequest['job_offer_id'] = $jobOffer->id;
        $jobRequest['uuid'] = (string) Str::uuid();
        if ($request->hasFile('file')) {
            $extension = $jobRequest['file']->guessClientExtension();

            // $jobRequest['file_path'] = $request->file->getClientOriginalName();
            // $jobRequest['file_path'] = time().'.'.$request->file->extension();  
            $jobRequest['file_path'] = "job_request_" . sha1(time()) . "." . $extension;  
            // dd($jobRequest);

            $request->file->storeAs('jobRequests', $jobRequest['file_path']);
            // $request->file->storeAs('jobRequests', $jobRequest['file_path']);
        }
        
        // dd($jobRequest);
        jobRequest::create($jobRequest);
        return redirect()->back()->with("success", "درخواست با موفقیت ارسال شد!");
    }

    public function downloadForm()
    {
        // if (!auth()->check()) {
        //     return abort(404);
        // }
        dd(null);
        $pathToFile = storage_path('app/resumeForm/resume.pdf');
        return response()->download($pathToFile);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobRequest  $jobRequest
     * @return \Illuminate\Http\Response
     */
    public function show(JobRequest $jobRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobRequest  $jobRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(JobRequest $jobRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequestRequest  $request
     * @param  \App\Models\JobRequest  $jobRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequestRequest $request, JobRequest $jobRequest)
    {
        
        $jobRequest['uuid'] = (string) Str::uuid();
        if ($request->hasFile('file')) {
            Storage::delete("jobRequests/".$jobRequest->file_path);
            $jobRequest['file_path'] = $request->file->getClientOriginalName();
            // $jobRequest['file_path'] = time().'.'.$request->file->extension();  
            $request->file->storeAs('jobRequests', $jobRequest['file_path']);
        }

        $jobRequest->update($request->all());
        return redirect()->back()->with('success', "درخواست با نام: $jobRequest->name با موفقیت ویرایش شد");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobRequest  $jobRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobRequest = JobRequest::findOrFail($id);
        $jobRequest->delete();
        return redirect()->back()->with('success', "رزومه با موفقیت حذف شد.");
    }
}
