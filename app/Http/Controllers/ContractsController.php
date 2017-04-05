<?php

namespace App\Http\Controllers;

use App\Contract;
use App\User;
use App\Post;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $user = auth()->user();

        // $contracts = Contract::where()


        $contracts_array = Contract::all();
  
        $contracts_as_bidder = [];
        $contracts_as_caretaker = [];

        foreach ($contracts_array as $contract)
        {
            $bidder_id = $contract->regardedBid->getBidder->id;

            $caretaker_id = $contract->regardedBid->getPost->getAuthor->id;

            if (auth()->user()->id == $bidder_id) {
                // echo($contract->id);
                array_push($contracts_as_bidder, $contract);
            } elseif (auth()->user()->id == $caretaker_id) {
                array_push($contracts_as_caretaker, $contract);
            }
        }
        $contracts_bidder = collect($contracts_as_bidder);
        $contracts_caretaker = collect($contracts_as_caretaker);



        return view('contract.index', compact('contracts_bidder', 'contracts_caretaker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        Contract::create([
            'signed_under'=> request('bid_id'),
            'signed_under_post'=> $post->id,
            ])->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
