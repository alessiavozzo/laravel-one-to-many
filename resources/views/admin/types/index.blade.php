@extends('layouts.admin')

@section('content')
    {{-- @dd($types) --}}
    <section id="types-content">

        <div class="container" data-bs-theme="dash-dark">

            <a class="text-decoration-none d-flex justify-content-end my-4 new-type" href="{{ route('admin.types.create') }}">
                <i class="fa-solid fa-plus"></i>
            </a>

            @include('admin.partials.session-messages')

            <div class="row row-cols-sm-1 row-cols-md-3 gy-3">
                @forelse ($types as $type)
                    <div class="col">
                        <div class="card" style="border-color:{{ $type->color }}">
                            <div class="card-header text-center fw-bold" style="background-color:{{ $type->color }}"
                                style="border-color: {{ $type->color }}; color: black">
                                {{ $type->name }}
                            </div>
                            <div class="card-body text-center">
                                {{-- <div class="card-text">{{ $type->slug }}</div> --}}
                                <a href="{{ route('admin.types.show', $type) }}" class="btn view-btn">Details</a>
                                <a href="{{ route('admin.types.edit', $type) }}" class="btn edit-btn">Edit</a>

                                <button type="button" class="btn delete-btn" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $type->id }}">
                                    Delete
                                </button>
                                <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $type->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                        role="document">
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
                @empty
                    <div class="col">
                        <p>No types defined</p>
                    </div>
                @endforelse
            </div>

        </div>

    </section>
@endsection
