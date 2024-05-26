@extends('layouts.admin')

@section('content')
    {{-- <div class="projects_header bg-section-dark py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="text-light">{{ $project->title }}</h2>
            <div class="actions">
                <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project) }}">
                    Edit
                </a>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#modalId-{{ $project->id }}">
                    Delete
                </button>
                @include('admin.partials.modal-delete')
            </div>
        </div>
    </div> --}}

    <section id="project" class="py-3 bg-section mb-5">
        <div class="container">
            <div data-bs-theme="dash-dark" class="card w-75 mx-auto">

                @if (Str::startsWith($project->project_image, 'https://'))
                    <img class="card-img-top mb-3" src="{{ $project->project_image }}" alt="{{ $project->title }}" />
                @else
                    <img width="card-img-top mb-3" loading="lazy" src="{{ asset('storage/' . $project->project_image) }}"
                        alt="{{ $project->title }}">
                @endif

                <div class="card-body position-relative">
                    <h4 class="card-title text-center mb-3">{{ $project->title }}</h4>
                    {{-- id --}}
                    <div class="card-text card-id position-absolute end-0 top-0 me-3 text-white">
                        {{ $project->id }}
                    </div>
                    {{-- slug --}}
                    <div class="card-text mb-2">
                        <strong>SLUG: </strong>
                        {{ $project->slug }}
                    </div>
                    {{-- project link --}}
                    <div class="card-text mb-2">
                        <strong>PROJECT LINK: </strong>
                        <a class="text-decoration-none" href="{{ $project->project_link }}"
                            target="_blank">{{ $project->project_link }}</a>
                    </div>
                    {{-- github link --}}
                    <div class="card-text mb-2">
                        <strong>GITHUB LINK: </strong>
                        <a class="text-decoration-none" href="{{ $project->github_link }}"
                            target="_blank">{{ $project->github_link }}</a>
                    </div>
                    {{-- description --}}
                    <div class="card-text mb-2">
                        <strong>DESCRIPTION: </strong>
                        {{ $project->description ? $project->description : 'N/A' }}
                    </div>
                    {{-- <p class="card-text"><strong>TOOLS: </strong>{{ $project->tools }}</p> --}}

                    {{-- creation date --}}
                    <div class="card-text mb-2">
                        <strong>CREATION DATE:</strong>
                        {{ $project->creation_date ? date('d-m-Y', strtotime($project->creation_date)) : 'N/A' }}
                    </div>

                    {{-- type --}}
                    <div class="card-text mb-2">
                        <strong class="pe-2">TYPE:</strong>
                        <a href="{{ $project->type ? route('admin.types.show', $project->type) : '#' }}"
                            class="type-badge text-decoration-none text-white p-2 d-inline-block text-center {{ $project->type ? '' : 'disabled ?>' }}"
                            style="background-color: {{ $project->type ? $project->type->color : 'grey' }}">
                            {{ $project->type ? $project->type->name : 'Not defined' }}
                        </a>

                    </div>

                    {{-- preview --}}
                    @if ($project->preview)
                        <div class="card-text">
                            <strong class="mb-2">PREVIEW: </strong><br>
                            <iframe width="300" height="200" src="{{ $project->preview }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    @endif

                    <div class="actions mt-4 d-flex gap-3 justify-content-center">
                        <a class="btn edit-btn" href="{{ route('admin.projects.edit', $project) }}">
                            Edit
                        </a>

                        <button type="button" class="btn delete-btn" data-bs-toggle="modal"
                            data-bs-target="#modalId-{{ $project->id }}">
                            Delete
                        </button>
                        @include('admin.partials.project-delete')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
