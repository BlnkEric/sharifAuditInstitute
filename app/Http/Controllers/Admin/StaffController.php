<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Image;
use App\Models\Industry;
use App\Models\Service;
use App\Models\Staff;
use App\Models\StaffCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::paginate(10);
        return view('admin.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::get();
        $staffCategories = StaffCategory::get();
        return view('admin.staffs.create', [
            'industries' => $industries,
            'staffCategories' => $staffCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRequest $request)
    {
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $staff = Staff::create($request->all());
        $imagePath = $request->file('image')->store('public/staff_images');
        $staff->image()->save(Image::make([
            'path' => $imagePath
        ]));

        return redirect(route('admin.staffs.index'))->with('success', 'کارمند جدید با موفقیت ساخته شد!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {

        $staff->load('industry');
        $staffCategories = StaffCategory::get();
        return view('admin.staffs.edit', [
            'industries' => Industry::get(),
            'staff' => $staff,
            'staffCategories' => $staffCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $staff->update($request->all());
        if ($request->hasFile('image')) {
            Storage::delete($staff->image->path);
            $imagePath = $request->file('image')->store('public/staff_images');
            $staff->image()->update([
                'path' => $imagePath
            ]);
        }
        return redirect(route('admin.staffs.index'))->with('success', "کارمند $staff->name با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff_name = $staff->name;
        $staff->delete();
        return redirect(route('admin.staffs.index'))->with('success', "کارمند $staff_name با موفقیت حذف شد.");
    }
}
