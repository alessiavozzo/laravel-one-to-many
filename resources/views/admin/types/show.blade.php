@extends('layouts.admin')

@section('content')
    <div class="container" data-bs-theme="dash-dark">


        <div class="card w-50 m-auto" style="border-color:{{ $type->color }}">
            <div class="card-header text-center fw-bold" style="background-color:{{ $type->color }}"
                style="border-color: {{ $type->color }}; color: black">
                {{ $type->name }}
            </div>
            <div class="card-body">
                {{-- id --}}
                <div class="card-text mb-2">
                    <strong style="color: {{ $type->color }}">SLUG: </strong>
                    {{ $type->id }}
                </div>
                {{-- slug --}}
                <div class="card-text mb-2">
                    <strong style="color: {{ $type->color }}">SLUG: </strong>
                    {{ $type->slug }}
                </div>
                {{-- description --}}
                <div class="card-text mb-4">
                    <strong style="color: {{ $type->color }}">DESCRIPTION: </strong>
                    {{ $type->description }}
                </div>
                {{-- buttons --}}
                <div class="actions text-center">
                    <a href="{{ route('admin.types.edit', $type) }}" class="btn edit-btn">Edit</a>

                    <button type="button" class="btn delete-btn" data-bs-toggle="modal"
                        data-bs-target="#modalId-{{ $type->id }}">
                        Delete
                    </button>
                    <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $type->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    {{-- name --}}
                                    <h5 class="modal-title" id="modalTitleId-{{ $type->id }}">
                                        You are deleting {{ $type->name }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                {{-- body - longer msg --}}
                                <div class="modal-body">You are about to delete this record. Do you want to
                                    proceed?</div>

                                {{-- buttons --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </button>

                                    <form action="{{ route('admin.types.destroy', $type) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Confirm
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="card-header">
            {{ $type->name }}
        </div>
        <div class="card-body">
            <div class="card-text">{{ $type->id }}</div>

        </div>

    </div>
@endsection
