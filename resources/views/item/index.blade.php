@extends('layouts.app')

@section('title', 'All items')

@section('content')
    <hgroup>
        <h2>All Items</h2>
        <p>@gregs</p>
    </hgroup>

    <figure>
        <table>
            <thead>
            <tr>
                <th>Asset ID</th>
                <th>Item Name</th>
                <th>Item Type</th>
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
                        <a href="{{ route('items.show', $it->id) }}">{{$it->name}}</a> </td>
                    <td>{{ $it->item_type->name }}
                        <a href="{{route('items.byType', $it->item_type->id)}}"> {{ $it->item_type->name }}</a>
                    </td>
                    <td>
                        <a href="{{ route('users.items', $it->user->id) }}">
                            {{ $it->user->full_name }}
                        </a>

                    </td>
                    <td>{{ $it->company_location->location_id }} - {{ $it->company_location->name }}</td>
                    <td>{{ $it->notes }}</td>
                    <td>{{ $it->deployment_status }}</td>
                    <td>{{ $it->updated_at }}</td>
                    <td>
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
