@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{ $gig->title }}</h3>
                    <hr/>
                    <img style="width: 100%" src="{{asset('/img/gigs/' . $gig->image)}}" class="img-repsonsive center-block">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>About This Gig</h4>
                </div>
                <div class="panel-body">
                    <p>{{ $gig->description }}</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Review</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-defaul">
                <div class="panel-body">

                    @if(Auth::check())
                        <form method="POST" action="">
                            {{csrf_field()}}
                            <div id="payment-form"></div>
                            <input name="gig_id" value="{{ $gig->id }}" hidden>
                            <button type="submit" class="btn btn-success btn-block">Order Now (${{ $gig->price }})
                            </button>
                        </form>
                    @else
                        You need to login to order this gig!
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection