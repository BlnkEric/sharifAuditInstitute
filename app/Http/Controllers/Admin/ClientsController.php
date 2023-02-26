<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Image;
use App\Models\Client;
use App\Models\Service;
use App\Models\Industry;
use App\Rules\UpdateIfNull;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);
        $clients->load(['industry', 'services', 'image']);
        // dd($clients->first());
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::get();
        $services = Service::get();
        return view('admin.clients.create', [
            'industries' => $industries,
            'services' => $services,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        // dd($request->all(), count($request->ser));
        
        $client = Client::create($request->except('services'));

        foreach ($request->services as $key => $value) {
            // dd($value);
            $client->services()->syncWithoutDetaching([
                $value => [
                    'service_name' => Service::findOrFail($value)->name
                ]
            ]);
        }


        $imagePath = $request->file('image')->store('public/client_images');
        $client->image()->save(Image::make([
            'path' => $imagePath
        ]));
        // dd($client->image);
        return redirect(route('admin.clients.index'))->with('success', 'مشتری جدید با موفقیت ساخته شد!');
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
    public function edit(Client $client)
    {
        $client->load('industry', 'services');
        // dd($client);
        return view('admin.clients.edit', [
            'industries' => Industry::get(),
            'services' => Service::get(),
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        // dd($request->all());
        $client->update($request->all());
        if (!$request->hasFile('image')) {
            $request->merge([
                'image' => null
            ]);
            $request->validate([
                'image' => new UpdateIfNull('images', $client),
            ]);
        }else{
            Storage::delete($client->image->path);
            $imagePath = $request->file('image')->store('public/client_images');
            $client->image()->update([
                'path' => $imagePath
            ]);
        }
        return redirect(route('admin.clients.index'))->with('success', "مشتری $client->name با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        // dd($client->image);
        $client->delete();
        return redirect(route('admin.clients.index'))->with('success', "مشتری $client->name با موفقیت حذف شد.");

    }
}
