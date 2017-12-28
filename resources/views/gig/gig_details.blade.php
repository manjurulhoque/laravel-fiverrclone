@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{ $gig->title }}</h3><br>
                    <p>{{ $gig->purchases->count() }} orders in queue</p>
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
                    <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #1b6d85; color: white">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('purchases.store')}}">
                                            {{csrf_field()}}
                                            <input name="gig_id" value="{{ $gig->id }}" hidden>
                                            <input name="to_user_id" value="{{ $gig->user->id }}" hidden>
                                            <div class="form-group">
                                                <label for="email">Price:</label>
                                                <input type="number" required name="price" min="5" max="5000" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Total days:</label>
                                                <input type="number" required name="days" min="1" max="30" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block">
                                                Order Now
                                            </button>
                                        </form>
                                    </div>
                                    {{--<div class="modal-footer">--}}
                                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                            Order Now (${{ $gig->price }})
                        </button>
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