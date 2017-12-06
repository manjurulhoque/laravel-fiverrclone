<?php

namespace App\Http\Controllers;

use App\Gig;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$gigs = Gig::all();
	    return view( 'home', compact('gigs', $gigs));
    }
}
