@extends('layouts.app')

@section('title', 'location home')

@section('content')
    <hgroup>
        <h2>{{$company->name}} Total Locations {{$company->locations_count}}</h2>
    </hgroup>

    {{--you have to remember to loop through the colleciton
    --}}
    @foreach($locations as $cl)
        <p>{{$cl->location_id}} - {{$cl->name}}<br/> Total Items {{$cl->items_count}}</p>
    @endforeach
@endsection

