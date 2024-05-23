@extends('layouts.admin')

@section('content')
    <div class="projects_header bg-section-dark py-2">
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
    </div>
    <section id="project" class="py-3 bg-section">
        <div class="container">
            <div class="card w-50 mx-auto bg-light">

                @if (Str::startsWith($project->project_image, 'https://'))
                    <img class="card-img-top" src="{{ $project->project_image }}" alt="{{ $project->title }}" />
                @else
                    <img width="card-img-top" loading="lazy" src="{{ asset('storage/' . $project->project_image) }}"
                        alt="{{ $project->title }}">
                @endif

                <div class="card-body">
                    <h4 class="card-title text-center">{{ $project->title }}</h4>
                    <p class="card-text"><strong>ID: </strong>{{ $project->id }}</p>
                    <p class="card-text"><strong>SLUG: </strong>{{ $project->slug }}</p>
                    <p class="card-text"><strong>PROJECT LINK: </strong>{{ $project->project_link }}</p>
                    <p class="card-text"><strong>GITHUB LINK: </strong>{{ $project->github_link }}</p>
                    <p class="card-text"><strong>DESCRIPTION: </strong>{{ $project->description }}</p>
                    {{-- <p class="card-text"><strong>TOOLS: </strong>{{ $project->tools }}</p> --}}
                    <p class="card-text"><strong>CREATION DATE: </strong>{{ $project->creation_date }}</p>


                    @if ($project->preview)
                        <div class="card-text">
                            <strong>PREVIEW: </strong><br>
                            <iframe width="300" height="200" src="{{ $project->preview }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
