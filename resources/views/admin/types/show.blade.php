@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card w-50 m-auto">
            <div class="card-header">
                {{ $type->name }}
            </div>
            <div class="card-body">
                <div class="card-text">{{ $type->id }}</div>
                <div class="card-text">{{ $type->slug }}</div>
                <div class="card-text">{{ $type->description }}</div>
            </div>
        </div>
    </div>
@endsection
