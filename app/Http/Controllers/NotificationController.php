<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Contract;

class NotificationController extends Controller
{
    //
    public function index()
    {
    	$notifications = Notification::latest()->get();

    	$contracts_array = Contract::latest()->get();
  
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



    	return view('notification', compact('notifications', 'contracts_bidder'));	
    }
}
