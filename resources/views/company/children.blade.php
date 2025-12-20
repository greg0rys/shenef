@extends('layouts.app')
@section('title', 'children')
@section('content')
    <h2>{{ $company->name}} Locations</h2>
    <table>
        <thead>
            <th>
                Location
            </th>
            <th>
            </th>
            <th>Total Items</th>
        </thead>
        <tbody>
        @foreach($children as $c)
            <tr>
                <td>
                    {{$c->location_id}} - {{$c->name}}
                </td>

                <td><a href="{{route('locations.items', $c)}}">View Location</a></td>

                <td>
                    {{$c->items()->count()}}

                </td>
            </tr>

        @endforeach
        </tbody>
    </table>


@endsection
