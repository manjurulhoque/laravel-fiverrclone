@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{ $gig->title }}</h3>
                    <hr/>
                    <img style="width: 100%" src="{{asset('/img/gigs/' . $gig->image)}}"
                         class="img-responsive center-block">
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
                    <h4>Reviews</h4>
                </div>
                <div class="panel-body">
                    @if($gig->reviews->count() > 0)
                        <ul class="list-group">
                            @foreach($gig->reviews as $review)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="" class="img-circle center-block"
                                                 height="60" width="60">
                                        </div>
                                        <div class="col-md-10">
                                            <h5>username</h5>
                                            <p>{{ $review->content }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h3>No review yet</h3>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(Auth::check())
                        <form method="POST" action="{{route('purchases.store')}}">
                            {{csrf_field()}}
                            {{--<div id="payment-form"></div>--}}
                            <input name="gig_id" value="{{ $gig->id }}" hidden>
                            <input name="to_user_id" value="{{ $gig->user->id }}" hidden>
                            <button type="submit" class="btn btn-success btn-block">Order Now (${{ $gig->price }})
                            </button>
                        </form>
                    @else
                        You need to login to order this gig!
                    @endif

                    <div style="margin-top: 30px">
                        @if($gig->user->profile->avater == null)
                            <img src="/media/avatar.png" class="img-circle center-block" height="100" width="100">
                        @else
                            <img src="{{asset('/img/gigs/' . $gig->user->profile->avater)}}"
                                 class="img-circle center-block" height="100" width="100">
                        @endif
                    </div>
                    <a href="{{ route('profile', $gig->user->username) }}">
                        <h4 class="text-center">{{ $gig->user->username }}</h4>
                    </a>
                    {{--<hr/>--}}
                    {{--{% if gig.user.profile.about %}--}}
                    {{--<p>{{ gig.user.profile.about }}</p>--}}
                    {{--{% else %}--}}
                    {{--<p>New seller</p>--}}
                    {{--{% endif %}--}}
                </div>
            </div>
        </div>
    </div>

@endsection