<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;
use Auth;

class PurchaseController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
	}

	public function store(Request $request)
    {
        Purchase::create([
        	'user_id' => Auth::user()->id,
	        'to_user_id' => $request->to_user_id,
	        'gig_id' => $request->gig_id
        ]);

        return redirect()->route('gigs.show', $request->gig_id);
    }

    public function sellings()
    {
    	$sellings = Purchase::where('user_id', Auth::user()->id)->get();

    	return view('purchases.my_buyings')->withSellings($sellings);
    }

    public function orders()
    {
		$orders = Purchase::where('to_user_id', Auth::user()->id)->get();

	    return view('purchases.my_orders')->withOrders($orders);
    }

    public function show_single($id)
    {
    	$purchase = Purchase::find($id);

    	return view('purchases.show_single')->withPurchase($purchase);
    }
}
