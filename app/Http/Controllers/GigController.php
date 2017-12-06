<?php

namespace App\Http\Controllers;

use App\Gig;
use Illuminate\Http\Request;
use Image;

class GigController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view( 'home' );
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
			'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
			'category_id' => 'required|integer',
			'body'        => 'required'
		) );
		$gig = new Gig;

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

		return redirect()->route( 'gigs.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		//
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
