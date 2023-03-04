<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialService;

class SpecialServiceController extends Controller
{
    
        /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecialService  $SpecialService
     * @return \Illuminate\Http\Response
     */
    public function show(SpecialService $specialService)
    {
        // dd($specialService);
        return view('front.SpecialServices.show', compact('specialService'));
    }
}


