@extends('layouts.app')

@section('title', 'user items')

@section('content')
    <table>
        <thead>
            <th>Asset Number</th>
            <th>Item Name</th>
        </thead>

        <tbody>
            @foreach($userItems as $u)
                <tr>
                    <td>
                        {{$u->asset_id}}
                    </td>
                    <td>
                        {{ $u->name }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

