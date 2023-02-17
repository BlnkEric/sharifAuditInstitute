<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\DescriptionImage;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Services\EditorImageUploadService;

class ServiceController extends Controller
{
    private $editorImageService;

    public function __construct(EditorImageUploadService $imageService)
    {
        $this->editorImageService = $imageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $service = Service::create($request->all());
        $imagePath = $request->file('image')->store('public/service_images');
        $service->image()->save(Image::make([
            'path' => $imagePath
        ]));

        return redirect(route('admin.services.index'))->with('success', 'خدمت جدید با موفقیت ساخته شد!');
    }

    public function uploadImageOnCreate(Request $request) {
        return $this->editorImageService->create($request);
    }

    public function uploadImageOnUpdate(Request $request, Service $service) {
        return $this->editorImageService->update($request, $service);
    }

    public function deleteImage(Request $request) {
        $this->editorImageService->delete($request);
        return redirect()->back()->with("success", "عکس توضیحات با موفقیت حذف شد!");
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
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $service->update($request->all());
        if ($request->hasFile('image')) {
            Storage::delete($service->image->path);
            $imagePath = $request->file('image')->store('public/service_images');
            $service->image()->update([
                'path' => $imagePath
            ]);
        }
        return redirect(route('admin.services.index'))->with('success', "خدمت $service->name با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service_name = $service->name;
        $service->delete();
        return redirect(route('admin.services.index'))->with('success', "خدمت $service_name با موفقیت حذف شد.");
    }
}
