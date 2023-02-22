<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Models\Industry;
use App\Models\Service;

class UserProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Auth::user()->proposals;
        $proposals->load([
            'industry',
            'service'
        ]);
        return view('front.proposals.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::all();
        $services = Service::all();
        return view('front.proposals.create', compact('industries', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProposalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProposalRequest $request)
    {
        $request->merge([
            'slug' => $this->make_slug($request),
            'user_id' => Auth::user()->id
        ]);
        Proposal::create($request->all());
        return redirect(route('proposals.index'))->with('success', 'درخواست خدمات جدید با موفقیت ثبت شد!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        return view('front.proposals.show', compact('proposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        $industries = Industry::all();
        $services = Service::all();
        return view('front.proposals.edit', compact('proposal', 'industries', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProposalRequest  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {
        // dd($proposal);
        $request->merge([
            'slug' => $this->make_slug($request),
            'user_id' => Auth::user()->id,
        ]);
        // $this->validate(
        //     $request,
        //     [
        //         // 'email' => [
        //         //     'required',
        //         //     Rule::unique('users')->ignore($request->user_id)
        //         // ],
        //         // 'email' => "unique:users,email,$this->id,id",
        //     ],
        //     [
        //         "user_id" => 'ویژگی با این وزن قبلا ثبت شده است'
        //     ]
        //     );

        $proposal->update($request->all());
        return redirect(route('proposals.index'))->with('success', "درخواست خدمات شما با نام: $proposal->name با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        $proposal_name = $proposal->name;
        $proposal->delete();
        return redirect(route('proposals.index'))->with('success', "درخواست خدمات $proposal_name با موفقیت حذف شد.");
    }
}
