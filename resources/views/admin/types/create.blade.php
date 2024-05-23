@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{ route('admin.types.store') }}" method="post">
            @csrf

            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Name</strong></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Project name" value="{{ old('name') }}" />
                <small id="nameHelper" class="form-text text-muted">Write type name</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Add</button>

        </form>
    </div>
@endsection
