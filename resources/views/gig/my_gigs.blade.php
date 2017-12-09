@extends('layouts.base')

@section('content')
    <h1 style="margin-bottom: 30px">My Gigs</h1>
    <div class="panel panel-default">
        <table class="table table-bordered table-striped">
            <thead class="bg-success">
            <tr>
                <th>Gig Title</th>
                <th>Price ($)</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($gigs as $gig)
                <tr>
                    <td><a href="{{ route('gigs.show', $gig->id) }}">{{ $gig->title }}</a></td>
                    <td>{{ $gig->price }}</td>
                    <td>
                        @if($gig->status)
                            Active
                        @else
                            Disabled
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection