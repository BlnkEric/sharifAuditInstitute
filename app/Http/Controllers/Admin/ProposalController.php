<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposal::paginate(10);
        return view('admin.proposals.index', compact('proposals'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */

    //i wonder if we need this - blade nazadam
    public function show(Proposal $proposal)
    {
        return view('admin.proposals.show', compact('proposal'));
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
        return redirect(route('admin.proposals.index'))->with('success', "درخواست خدمات $proposal_name با موفقیت حذف شد.");
    }
}
