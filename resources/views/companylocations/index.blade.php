@extends('layouts.app')
@section('title', 'Location Index')

@section('content')
    <div>
        <table>
            <thead>
                <th>Location Name</th>
                <th>Location ID</th>
            </thead>
            @foreach($locations as $location)
                <tr>
                    <td>{{ $location->name }}</td>
                    <td>{{$location->location_id}}</td>
                </tr>

            @endforeach
        </table>
    </div>

@endsection

