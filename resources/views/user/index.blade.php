@extends('layouts.app')

@section('title', 'ORDRLI Users')

@section('content')
    <hgroup>
        <h2>Total Users {{$user->count()}}</h2>
    </hgroup>
    <table>
        <thead>
            <th>User ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Job Role</th>
        </thead>

        <tbody>
        @foreach($user as $u)
            <tr>
                <td>
                    {{$u->id}}
                </td>
                <td>
                    {{$u->full_name}}
                </td>
                <td>
                    {{$u->company->name}}
                </td>
                <td>
                    {{$u->role->name}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
