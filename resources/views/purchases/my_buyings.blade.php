@extends('layouts.base')

@section('content')
    <h1 style="margin-bottom: 30px">My Buyings</h1>
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
            @foreach($sellings as $sell)
                <tr>
                    <td><a href="">{{ $sell->gig->title }}</a></td>
                    <td>{{ $sell->gig->price }}</td>
                    <td>{{ $sell->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
