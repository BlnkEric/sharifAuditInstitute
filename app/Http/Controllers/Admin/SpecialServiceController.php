<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\SpecialService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\EditorImageUploadService;
use App\Http\Requests\StoreSpecialServiceRequest;
use App\Http\Requests\UpdateSpecialServiceRequest;

class SpecialServiceController extends Controller
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
    public function index(Service $service)
    {
        $special_services = $service->specialServices()->paginate(10);

        return view('admin.specialServices.index', compact(['service', 'special_services']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        return view('admin.specialServices.create', [
            'service' => $service
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecialServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialServiceRequest $request, Service $service)
    {
        // dd($service);
        $request->merge([
            'slug' => $this->make_slug($request),
            'service_id' => $service->id
        ]);
        $sp_service = SpecialService::create($request->all());
        $imagePath = $request->file('image')->store('public/special_service_images');
        $sp_service->image()->save(Image::make([
            'path' => $imagePath
        ]));
        return redirect(route('admin.specialServices.index', ['service' => $service->slug, 'specialService' => $sp_service->slug]))->with('success', 'خدمت خاص جدید با موفقیت ساخته شد!');
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
     * @param  \App\Models\SpecialService  $specialService
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialService $specialService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecialService  $specialService
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service, SpecialService $specialService)
    {
        return view('admin.specialServices.edit', compact('service', 'specialService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecialServiceRequest  $request
     * @param  \App\Models\SpecialService  $specialService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialServiceRequest $request, Service $service, SpecialService $specialService)
    {
        // dd($specialService);
        $request->merge([
            'slug' => $this->make_slug($request)
        ]);
        $specialService->update($request->all());
        if ($request->hasFile('image')) {
            Storage::delete($specialService->image->path);
            $imagePath = $request->file('image')->store('public/special_service_images');
            $specialService->image()->update([
                'path' => $imagePath
            ]);
        }
        return redirect(route('admin.specialServices.index'))->with('success', "خدمت $specialService->name با موفقیت ویرایش شد");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecialService  $specialService
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, SpecialService $specialService)
    {
        $specialService_name = $specialService->name;
        $specialService->delete();
        return redirect(route('admin.specialServices.index'))->with('success', "خدمت $specialService_name با موفقیت حذف شد.");    
    }
}
