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
            </tr>
            </thead>
            <tbody>
            @foreach($items as $it)
                <tr>
                    <td>{{ $it->asset_id }}</td>
                    <td>{{ $it->name }}</td>
                    <td>{{ $it->item_type->name }}</td>
                    <td>
                        <a href="{{ route('users.items', $it->user->id) }}">
                            {{ $it->user->full_name }}
                        </a>
                    </td>
                    <td>{{ $it->company_location->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </figure>
@endsection
