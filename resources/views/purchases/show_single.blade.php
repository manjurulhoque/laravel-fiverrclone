@extends('layouts.base')

@section('content')
    <h1 style="margin-bottom: 30px">{{ $purchase->gig->title }}</h1>
    <div class="panel panel-success">
        <div class="panel-body">
            <h4>Order by: {{ $purchase->gig->user->username }}</h4>
            <p>Delivery time: within {{ $purchase->days }} days</p>
            <h3>Price: ${{ $purchase->price }}</h3>
        </div>
    </div>
@endsection
