@extends('layouts.app')
@section('title', 'Edit')

@section('content')
    <main class="container">
        <article>
            <header>
                <hgroup>
                    <h1>Edit {{ $item->name }}</h1>
                    <p>Asset ID: {{ $item->asset_id ?? 'N/A' }}</p>
                </hgroup>
            </header>

            <form action="{{ route('items.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="name">Item Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" required>

                <div class="grid">
                    <label for="make">Make
                        <input type="text" id="make" name="make" value="{{ old('make', $item->make) }}">
                    </label>
                    <label for="model">Model
                        <input type="text" id="model" name="model" value="{{ old('model', $item->model) }}">
                    </label>
                </div>

                <div class="grid">
                    <label for="asset_id">Asset ID
                        <input type="number" id="asset_id" name="asset_id"
                               value="{{ old('asset_id', $item->asset_id) }}">
                    </label>

                    <label for="deployment_status">Deployment Status
                        <select id="deployment_status" name="deployment_status">
                            <option value="Deployed" {{ $item->deployment_status == 'Deployed' ? 'selected' : '' }}>
                                Deployed
                            </option>
                            <option value="In Storage" {{ $item->deployment_status == 'Available' ? 'selected' : '' }}>
                                Available
                            </option>
                            <option
                                value="Maintenance" {{ $item->deployment_status == 'Destroyed' ? 'selected' : '' }}>
                                Destroyed
                            </option>
                        </select>
                    </label>
                </div>

                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" rows="5"
                          placeholder="Enter notes here...">{{ old('notes', $item->notes) }}</textarea>
                <small>Current rendered view:</small>
                <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
                    {!! $item->notes ?: '<em>No notes available.</em>' !!}
                </div>

                <footer class="grid">
                    <button type="submit">Save Changes</button>
                    <a href="{{ route('items.index') }}" class="secondary" role="button">Cancel</a>
                </footer>
            </form>

            <hr>

            <form action="{{ route('items.destroy', $item) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="outline contrast">Delete Item</button>
            </form>
        </article>
    </main>
@endsection
