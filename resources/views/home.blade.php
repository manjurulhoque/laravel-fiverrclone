@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($gigs as $gig)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="{{ route('gigs.show', $gig->id) }}">
                            <img src="{{asset('/img/gigs/' . $gig->image)}}">
                        </a>
                        <div class="caption">
                            <p><a href="{{ route('gigs.show', $gig->id) }}">{{ $gig->title }}</a></p>
                            <p><span>by <a href="">{{ $gig->user->username }}</a></span>
                                <b class="green pull-right">${{ $gig->price }}</b>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
