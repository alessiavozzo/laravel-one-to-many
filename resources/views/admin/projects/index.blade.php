@extends('layouts.admin')

@section('content')
    <section id="all_projects">

        <div class="card projects-card">
            <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center">
                <h3 class="text-white">My Projects</h3>
                <a class="btn add-btn" href="{{ route('admin.projects.create') }}">Add new project</a>
            </div>

            <div class="card-body p-4">
                @include('admin.partials.session-messages')
                <div class="table-responsive rounded">
                    <table class="table projects-table table-dark table-hover m-0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">TITLE</th>
                                {{-- <th scope="col">SLUG</th> --}}
                                <th scope="col">PROJECT IMAGE</th>
                                <th scope="col">PREVIEW</th>
                                {{-- <th scope="col">TOOLS</th> --}}
                                <th scope="col">PROJECT LINK</th>
                                <th scope="col">GITHUB LINK</th>
                                <th scope="col">TYPE</th>
                                <th scope="col">CREATION DATE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($projects as $project)
                                <tr class="align-middle">
                                    <td scope="row">{{ $project->id }}</td>
                                    <td>{{ $project->title }}</td>
                                    {{-- <td>{{ $project->slug }}</td> --}}
                                    <td>
                                        {{-- <img width="100" src="{{ $project->project_image }}" alt="{{ $project->title }}"> --}}
                                        @if (Str::startsWith($project->project_image, 'https://'))
                                            <img width="100" loading="lazy" src="{{ $project->project_image }}"
                                                alt="{{ $project->title }}">
                                        @else
                                            <img width="100" loading="lazy"
                                                src="{{ asset('storage/' . $project->project_image) }}"
                                                alt="{{ $project->title }}">
                                        @endif
                                    </td>
                                    <td><a class="text-decoration-none" href="{{ $project->preview }}">Video link</a></td>
                                    {{-- <td>{{ $project->tools }}</td> --}}
                                    <td><a class="text-decoration-none" href="{{ $project->project_link }}">Project link</a>
                                    </td>
                                    <td><a class="text-decoration-none" href="{{ $project->github_link }}">Github link</a>
                                    </td>

                                    <td>
                                        @if ($project->type)
                                            <a class="text-decoration-none badge"
                                                style="background-color: {{ $project->type->color }}"
                                                href="{{ route('admin.types.show', $project->type) }}">{{ $project->type->name }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td>{{ $project->creation_date }}</td>
                                    <td style="width: 15%">
                                        <a class="btn btn-primary" href="{{ route('admin.projects.show', $project) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project) }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalId-{{ $project->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        @include('admin.partials.modal-delete')

                                    </td>
                                </tr>

                            @empty

                                <tr class="">
                                    <td scope="row" colspan="6">No projects found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
        {{ $projects->links('pagination::bootstrap-5') }}
        {{-- @dd($projects) --}}




    </section>
@endsection
