<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use App\Http\Requests\StoreJobOfferRequest;
use App\Http\Requests\UpdateJobOfferRequest;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobOffers = JobOffer::paginate(10);
        return view('front.jobOffers.index', compact('jobOffers'));
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
     * @param  \App\Http\Requests\StoreJobOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobOfferRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function show(JobOffer $jobOffer)
    {
        $jobOffer->load('tags');
        // dd($jobOffer->tags);
        return view('front.jobOffers.show', compact('jobOffer'));
    }

    public function downloadForm()
    {
        // if (!auth()->check()) {
        //     return abort(404);
        // }
        $pathToFile = storage_path('app/resumeForm/resume.pdf');
        return response()->download($pathToFile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(JobOffer $jobOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobOfferRequest  $request
     * @param  \App\Models\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobOfferRequest $request, JobOffer $jobOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobOffer $jobOffer)
    {
        //
    }
}
