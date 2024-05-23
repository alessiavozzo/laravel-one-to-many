@extends('layouts.admin')

@section('content')
    {{-- @dd($types) --}}
    <div class="container">
        <div class="row">
            @forelse ($types as $type)
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            {{ $type->name }}
                        </div>
                        <div class="card-body">
                            <div class="card-text">{{ $type->slug }}</div>
                            <a href="{{ route('admin.types.show', $type) }}" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p>No types defined</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
