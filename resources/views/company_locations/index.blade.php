@extends('layouts.app')

@section('title', 'view all items')

@section('content')
    <hgroup>
        <h3>
            {{ucfirst($company_name)}} - {{$items->count()}} Total Items
        </h3>
        <h6>
            {{$location->address}}, {{$location->city}}, {{$location->state}} {{$location->zip}}
        </h6>
        <h6>Admin: {{$location->admin->full_name}} </h6>
        <h6>Phone: {{$location->phone}}</h6>
    </hgroup>

    <table>
        <thead>
            <th>Asset ID</th>
            <th>Item</th>
            <th>Assigned To</th>
        </thead>

        <tbody>
        @foreach($items as $c)
            <tr>
                <td>
                    {{$c->asset_id}}
                </td>
                <td>
                    {{$c->name}}

                </td>
                <td>
                    {{$c->user->full_name}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
