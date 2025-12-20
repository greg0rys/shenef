@extends('layouts.app')
@section('title', 'children')
@section('content')
    <h2>{{ $company->name}} Locations</h2>
    <table>
        <thead>
        <th>
            Location
        </th>
        <th>Total Items</th>

        <th>
            Options
        </th>
        </thead>
        <tbody>
        @foreach($children as $c)
            <tr>
                <td>
                    {{$c->location_id}} - {{$c->name}}
                </td>
                <td>
                    {{$c->items()->count()}}

                </td>

                <td><a href="{{route('locations.items', $c)}}">View Location</a></td>


            </tr>

        @endforeach
        </tbody>
    </table>

@endsection
