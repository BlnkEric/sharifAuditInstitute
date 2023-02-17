<?php

namespace App\Http\Controllers;

use App\Models\Industry;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industry::get();
        $industries->load([
            'image',
            'proposals.user' => function($query) {
                return $query->where('approved_client', true);
            }
        ]);
        return view('front.industries.index', compact('industries'));
    }
}
