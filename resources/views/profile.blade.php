@extends('layouts.base')

@section('content')
    @if(Auth::check())
        <form method="post" action="{{ route('profile.update', $profile->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="jumbotron text-center">
                <h1><b>{{ $profile->about }}</b></h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    @if($profile->avatar == null)
                        <img src="/media/avatar.png" class="img-circle" height="120" width="120">
                    @else
                        <img src="{{ $profile->avatar }}" class="img-circle" height="120" width="120">
                    @endif
                    <h3 class="text-uppercase"><b>About {{ $profile->user->username }}</b></h3>
                    <hr/>
                    @if($profile->about)
                        <input class="form-control" name="about" value="{{ $profile->about }}">
                    @else
                        <input class="form-control" name="about" placeholder="Enter you bio">
                    @endif
                    <br/>
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
        </form>
    @else
        <div class="jumbotron text-center">
            <h1><b>{{ $profile->about }}</b></h1>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                @if($profile->avatar == null)
                    <img src="/media/avatar.png" class="img-circle" height="120" width="120">
                @else
                    <img src="{{ $profile->avatar }}" class="img-circle" height="120" width="120">
                @endif
                <h3 class="text-uppercase"><b>About {{ $profile->user->username }}</b></h3>
                <hr/>
                <p>{{ $profile->about }}</p>
            </div>
        </div>
    @endif

    <h3 class="text-uppercase" style="margin-top:50px"><b>{{ $profile->user->username }}'s gigs</b></h3>
    <div class="row">
        @foreach($profile->user->gigs as $gig)
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="{{ route('gigs.show', $gig->id) }}"><img src="{{asset('/img/gigs/' . $gig->image)}}"></a>
                    <div class="caption">
                        <p><a href="">{{ $gig->title }}</a></p>
                        <p>
                        <span>
                        <a href="">By {{ $gig->user->username }}</a>
                        </span>
                            <b class="green pull-right">$ {{ $gig->price }}</b>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
