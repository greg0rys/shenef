@extends('layouts.app')

@section('title', 'ORDRLI Users')

@section('content')
    <hgroup>
        <h2>Total Users {{$user->count()}}</h2>
    </hgroup>
    @foreach($user as $u)
        <p><span>{{$u->id}}. </span>{{$u->full_name}}</p>
    @endforeach
@endsection
