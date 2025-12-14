@extends('layouts.app')
@section('title', "Items for $user->full_name")

@section('content')
    <body>
    <main class="container">
        <hgroup>
            <h1>Items for {{ $user->full_name }}</h1>
            <p>User ID: {{ $user->id }} | Total Items: {{ $userItems->count() }}</p>
        </hgroup>

        @if($userItems->isEmpty())
            <article>
                <p>No items found for this user.</p>
            </article>
        @else
            <figure>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type ID</th>
                        <th>Asset ID</th>
                        <th>Location ID</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userItems as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><strong>{{ $item->name }}</strong></td>
                            <td>{{ $item->item_type_id }}</td>
                            <td>{{ $item->asset_id }}</td>
                            <td>{{ $item->company_location_id }}</td>
                            <td>{{ $item->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </figure>
        @endif
    </main>
    </body>
@endsection

