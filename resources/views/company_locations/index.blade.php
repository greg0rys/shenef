@extends('layouts.app')

@section('title', 'view all items')

@section('content')
    <hgroup>
        <h3>
            Items for {{ucfirst($company_name)}}
        </h3>
        <h6>
            Total: {{$items->count()}}

        </h6>
    </hgroup>

    @foreach($items as $c)
        <p>{{$c->name}}<br> Assigned To: {{$c->user->full_name}} <br/> {{$c->asset_id}}</p>
    @endforeach

@endsection
