@extends('layouts.app')
@section('title', 'All Companies')

@section('content')
    <table>
        <thead>
            <th>Company</th>
        </thead>

        <tbody>
        @foreach($companies as $c)
            <tr>
                <td>
                    <a href="{{route('companies.children', $c)}}"> {{$c->name}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
