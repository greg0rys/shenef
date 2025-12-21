@extends('layouts.app')
@section('title', 'All Companies')

@section('content')
    <table>
        <thead>
            <th>Company</th>
            <th>Total Locations</th>
            <th>Homepage</th>
        </thead>

        <tbody>
        @foreach($companies as $c)
            <tr>
                <td>
                    <a href="{{route('companies.children', $c)}}"> {{$c->name}}</a>
                </td>
                <td>
                    {{ $c->locations->count() }}
                </td>
                <td>
                    <a href="{{route('company.company_home', $c)}}"> Go</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
