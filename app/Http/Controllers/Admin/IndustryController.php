<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndustryRequest;
use App\Http\Requests\UpdateIndustryRequest;
use App\Models\Image;
use Illuminate\Support\Str;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industry::paginate(10);
        return view('admin.industries.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.industries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIndustryRequest $request)
    {
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $industry = Industry::create($request->all());
        $imagePath = $request->file('image')->store('public/industry_images');
        $industry->image()->save(Image::make([
            'path' => $imagePath
        ]));

        return redirect(route('admin.industries.index'))->with('success', 'صنعت جدید با موفقیت ساخته شد!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndustryRequest $request, Industry $industry)
    {
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $industry->update($request->all());
        if ($request->hasFile('image')) {
            Storage::delete($industry->image->path);
            $imagePath = $request->file('image')->store('public/industry_images');
            $industry->image()->update([
                'path' => $imagePath
            ]);
        }
        return redirect(route('admin.industries.index'))->with('success', "صنعت $industry->name با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industry $industry)
    {
        $industry_name = $industry->name;
        $industry->delete();
        return redirect(route('admin.industries.index'))->with('success', "صنعت $industry_name با موفقیت حذف شد.");
    }
}
