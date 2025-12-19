@extends('layouts.app')
@section('title', 'Super Admins')

@section('content')

    @if(!$admin_users->isEmpty())
        Total Admin Users: {{$admin_users->count()}}<br/>
    @endif

    @foreach($admin_users as $u)

        @if($u->trashed())
            <p>
                {{$u->full_name}} deleted
            </p>
        @else
            <p> {{ $u->full_name }} <br/> ID: {{$u->id}} <br/> Admin Role: {{$u->role->name}}
                <br/>Contact {{$u->company_email}}</p>
        @endif

    @endforeach
@endsection

