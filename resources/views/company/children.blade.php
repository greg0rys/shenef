@extends('layouts.app')
@section('title', 'children')
@section('content')
    <h2>{{ $company->name}} Locations</h2>
    @foreach($children as $c)

        <p>
            {{$c->location_id}} - {{$c->name}}
        </p>
    @endforeach

@endsection
