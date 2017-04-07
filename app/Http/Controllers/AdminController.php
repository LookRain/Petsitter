<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Contract;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		return view('admin.index');
	}

	public function editUser(Request $request, User $u)
	{

		
		// $exists = !is_null(User::find($id));
		// if (!is_null($id) && !$exists) {
		// 	// dd('adsf');
		// 	return back()->withErrors(array('message' => 'User does not exist.'));
		// }
		$this->validate($request, [
        'user' => 'required',
        'user' => 'exists:users,id'
    	],
    	['user.required' => 'User ID field is required',
    	'user.exists' => 'Invalid User ID'
    	]);

		
		// $
		// dd($id);
		$id = request('user');
		$user = User::find($id);
		return view('admin.user', compact('user'));

	}

	public function updateUser()
	{
		$user = User::find(request('id'));
		// $temp = request('is_admin');
		// dd($temp);
		if (request('is_admin')) {
			$user->isAdmin = 1;
		} else {
			$user->isAdmin = 0;
		}

		$user->save();

		return redirect('/admin');
		// return redirect('/');
	}

	public function deleteUser()
	{
		$user = User::find(request('id'));
		$user->delete();

		return redirect('/admin');
	}


	public function editBid(Request $request, Bid $b)
	{
		// $id = request('bid');
		// $exists = !is_null(Bid::find($id));
		// dd($exists);
		$this->validate($request, [
        'bid' => 'required',
        'bid' => 'exists:bids,id'
    	],
    	['bid.required' => 'Bid ID field is required',
    	'bid.exists' => 'Invalid Bid ID'
    	]);

		$id = request('bid');

		$bid = Bid::find($id);
		return view('admin.bid', compact('bid'));
	}

	public function deleteBid()
	{
		$bid = Bid::find(request('id'));
		$bid->delete();

		return redirect('/admin');
	}


	public function editContract(Request $request, Contract $c)
	{
		$this->validate($request, [
        'contract' => 'required',
        'contract' => 'exists:contracts,id'
    	],
    	['contract.required' => 'Contract ID field is required',
    	'contract.exists' => 'Invalid Contract ID'
    	]);

    	$id = request('contract');

    	$contract = Contract::find($id);
    	return view('admin.contract', compact('contract'));
	}

	public function deleteContract()
	{
		$contract = Contract::find(request('id'));
		$contract->delete();

		return redirect('/admin');
	}
}
