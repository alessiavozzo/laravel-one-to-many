@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card w-50 m-auto">
            <div class="card-header">
                {{ $type->name }}
            </div>
            <div class="card-body">
                <div class="card-text">{{ $type->slug }}</div>
                <a href="{{ route('admin.types.show', $type) }}" class="btn btn-primary">Details</a>
            </div>
        </div>
    </div>
@endsection
