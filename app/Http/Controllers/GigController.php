<?php

namespace App\Http\Controllers;

use App\Gig;
use Illuminate\Http\Request;
use Image;
use Auth;

class GigController extends Controller {

	public function __construct() {
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$gigs = Gig::all()->where('user_id', Auth::user()->id);
		return view( 'gig.my_gigs')->withGigs($gigs);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'gig.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$this->validate( $request, array(
			'title'       => 'required|max:255',
			'price'       => 'required',
			'category'    => 'required',
			'description' => 'required'
		) );
		$gig = new Gig;

		$gig->user_id = Auth::user()->id;
		$gig->title       = $request->title;
		$gig->category    = $request->category;
		$gig->description = $request->description;
		$gig->price = $request->price;
		$gig->status = $request->status;

		if ( $request->hasFile( 'photo' ) ) {
			$image    = $request->file( 'photo' );
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path( 'img/gigs/' . $filename );
			Image::make( $image )->resize( 800, 400 )->save( $location );
			$gig->image = $filename;
		}

		$gig->save();

		return redirect()->route( 'my_gigs');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Gig $gig
	 *
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 *
	 */
	public function show(Gig $gig ) {
		//$gig = Gig::find($gig);

		return view('gig.gig_details')->withGig($gig);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}
}
