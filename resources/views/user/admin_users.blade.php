@extends('layouts.app')
@section('title', 'Super Admins')

@section('content')

    @if(!$users->isEmpty())
        Total Super Admins: {{$users->count()}}<br/>
    @endif

    @foreach($users as $u)

        <p> {{ $u->full_name }} <br/> ID: {{$u->id}} <br/> Admin Role: {{$u->role->name}} <br/>Contact {{$u->company_email}}</p>
    @endforeach
@endsection

