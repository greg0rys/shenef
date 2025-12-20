@extends('layouts.app')

@section('title', 'All items')

@section('content')
    <hgroup>
        <h2>Item Type: @if($items->isNotEmpty())
                {{$items->first()->item_type->name}}
            @else
                NULL
            @endif</h2>
        <p>@gregs</p>
    </hgroup>

    <figure>
        <table>
            <thead>
            <tr>
                <th>Asset ID</th>
                <th>Item Name</th>
                <th>Make</th>
                <th>Model</th>
                <th>Assigned User</th>
                <th>Item Location</th>
                <th>Notes</th>
                <th>Deployment Status</th>
                <th>Last Update</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $it)
                <tr>
                    <td>{{ $it->asset_id }}</td>
                    <td>
                        <a href="{{ route('items.show', $it->id) }}">{{$it->name}}</a>
                    </td>
                    <td>{{ $it->make }}</td>
                    <td>{{ $it->model }}</td>

                    <td>
                        <a href="{{ route('users.items', $it->user->id) }}">
                            {{ $it->user->full_name }}
                        </a>

                    </td>
                    <td>{{ $it->company_location->location_id }} - {{ $it->company_location->name }}</td>
                    <td>{!! $it->notes !!}</td>

                    @if($it->deployment_status == 'Deployed')
                        <td style="color:darkslateblue">{{ $it->deployment_status }}</td>
                    @elseif($it->deployment_status == 'Destroyed')
                        <td style="color:darkred">{{ $it->deployment_status }}</td>
                    @else
                        <td style="color:darkgreen">{{ $it->deployment_status }}</td>
                    @endif

{{--                    check to see if deleted at is set or not.--}}
                    @if($it->deleted_at)
                        <td style="color: darkred">
                            {{ $it->deleted_at->format('m/d/y') }}</td>
                        <td>
                    @else
                        <td style="color:orange">
                            {{ $it->updated_at->format('m/d/y') }}</td>
                        <td>
                    @endif

                        <a href="{{ route('items.destroy', $it) }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i> Edit Item
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </figure>
@endsection
