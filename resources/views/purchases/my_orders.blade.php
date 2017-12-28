@extends('layouts.base')

@section('content')
    <h1 style="margin-bottom: 30px">My Orders</h1>
    <div class="panel panel-success">
        <table class="table table-bordered table-striped">
            <thead class="bg-success">
            <tr>
                <th>Gig Title</th>
                <th>Price ($)</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td><a href="{{ route('show_single', $order->id) }}">{{ $order->gig->title }}</a></td>
                    <td>{{ $order->gig->price }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
