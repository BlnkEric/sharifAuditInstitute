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

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
        return view('front.industries.show', compact('industry'));
    }

            /**
     * Display the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function industryArticles(Industry $industry)
    {
        return view('front.industries.ind_arts', [
            'industry_articles' => $industry->articles
        ]);
    }

}
