@extends('layouts.app')
@section('title', 'all companies')

@section('content')
    <table>
        <thead>
            <th>Company</th>

        </thead>

        <tbody>
        @foreach($companies as $c)
            <tr>
                <td>
                    {{$c->name}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
