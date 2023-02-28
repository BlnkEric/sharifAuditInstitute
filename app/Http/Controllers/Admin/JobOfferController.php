<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Image;
use App\Models\JobOffer;
use App\Models\JobRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
        return view('admin.jobOffers.index', compact('jobOffers'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::get();
        return view('admin.jobOffers.create', [
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobOfferRequest $request)
    {
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $jobOffer = JobOffer::create($request->except('tags'));
        $jobOffer->tags()->sync($request->tags);
        // $jobOffer->tags()->syncWithoutDetaching($request->tags);

        $imagePath = $request->file('image')->store('public/jobOffers_images');
        $jobOffer->image()->save(Image::make([
            'path' => $imagePath
        ]));

        return redirect(route('admin.jobOffers.index'))->with('success', 'موقعیت شغلی جدید با موفقیت ایجاد شد!');
    }

    public function download($uuid)
    {
        if (!auth()->check()) {
            return abort(404);
        }
        $jobRequest = JobRequest::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/jobRequests/' . $jobRequest->file_path);
        return response()->download($pathToFile);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function show(JobOffer $jobOffer)
    {
        $jobOffer->load('jobRequests');
        return view('admin.jobOffers.show', compact('jobOffer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(JobOffer $jobOffer)
    {
        $tags = Tag::get();

        $jobOffer->load('tags');
        return view('admin.jobOffers.edit', [
            'jobOffer' => $jobOffer, 
            'tags' => $tags
        ]);
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
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $jobOffer->update($request->except('tags'));
        $jobOffer->tags()->sync($request->tags);

        if ($request->hasFile('image')) {
            Storage::delete($jobOffer->image->path);
            $imagePath = $request->file('image')->store('public/jobOffers_images');
            $jobOffer->image()->update([
                'path' => $imagePath
            ]);
        }
        return redirect(route('admin.jobOffers.index'))->with('success', "موقعیت شغلی $jobOffer->name با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobOffer  $jobOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobOffer $jobOffer)
    {
        $jobOffer_name = $jobOffer->name;
        $jobOffer->delete();
        return redirect(route('admin.jobOffers.index'))->with('success', "موقعیت شغلی $jobOffer_name با موفقیت حذف شد.");
    }
}
