@extends('layouts.app')
@section('title', 'View Item')

@section('content')


    @if(!$item == null)
        <p>ddd</p>
        <p>
            {{ $item->name }}
            <br/>
            Asset Number: {{ $item->asset_id }}
            <br/>
            Assigned To: {{ $item->user->full_name }}
        </p>
    @endif

@endsection

