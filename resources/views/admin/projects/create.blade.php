@extends('layouts.admin')

@section('content')
    <div class="projects_header bg-section-dark py-2">
        <div class="container">
            <h2 class="text-light">New project</h2>
        </div>
    </div>
    <section id="creation_form" class="py-3 bg-section">
        <div class="container">

            <form class="form-control bg-light p-4" action="{{ route('admin.projects.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf

                {{-- title --}}
                <div class="mb-3">
                    <label for="title" class="form-label"><strong>Title</strong></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" aria-describedby="titleHelper" placeholder="Project title"
                        value="{{ old('title') }}" />
                    <small id="titleHelper" class="form-text text-muted">Write the project title</small>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- slug --}}
                {{-- lo slug lo genero dietro le quinte, non devo inserirlo io --}}

                {{-- project image --}}
                {{-- <div class="mb-3">
                    <label for="project_image" class="form-label">project_image</label>
                    <input type="text" class="form-control @error('project_image') is-invalid @enderror"
                        name="project_image" id="project_image" aria-describedby="project_imageHelper"
                        placeholder="project_image" value="{{ old('project_image') }}" />
                    <small id="project_imageHelper" class="form-text text-muted">Add a link to project image</small>
                    @error('project_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{-- img as file --}}
                <div class="mb-3">
                    <label for="project_image" class="form-label"><strong>Image</strong></label>
                    <input type="file" class="form-control @error('project_image') is-invalid @enderror"
                        name="project_image" id="project_image" aria-describedby="project_imageHelper" />
                    <small id="project_imageHelper" class="form-text text-muted">Upload an image showing the project
                        preview</small>
                    @error('project_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="preview" class="form-label"><strong>Preview</strong></label>
                    <input type="text" class="form-control @error('preview') is-invalid @enderror" name="preview"
                        id="preview" aria-describedby="previewHelper"
                        placeholder="https://www.youtube.com/embed/OFBIc-UuJUc?si=Pub7SMicmdAeluDQ"
                        value="{{ old('preview') }}" />
                    <small id="previewHelper" class="form-text text-muted">Add link to project preview video</small>
                    @error('preview')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- tools --}}
                {{-- <div class="mb-3">
                    <label for="tools" class="form-label">tools</label>
                    <input type="text" class="form-control @error('tools') is-invalid @enderror" name="tools"
                        id="tools" aria-describedby="toolsHelper" placeholder="tools" value="{{ old('tools') }}" />
                    <small id="toolsHelper" class="form-text text-muted">Write the tools you used for the project</small>
                    @error('tools')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{-- project link --}}
                <div class="mb-3">
                    <label for="project_link" class="form-label"><strong>Project link</strong></label>
                    <input type="text" class="form-control @error('project_link') is-invalid @enderror"
                        name="project_link" id="project_link" aria-describedby="project_linkHelper"
                        placeholder="https://project_link" value="{{ old('project_link') }}" />
                    <small id="project_linkHelper" class="form-text text-muted">Add project link</small>
                    @error('project_link')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- github link --}}
                <div class="mb-3">
                    <label for="github_link" class="form-label"><strong>Github link</strong></label>
                    <input type="text" class="form-control @error('github_link') is-invalid @enderror" name="github_link"
                        id="github_link" aria-describedby="github_linkHelper"
                        placeholder="https://github.com/gituser/repo_name" value="{{ old('github_link') }}" />
                    <small id="github_linkHelper" class="form-text text-muted">Add github link</small>
                    @error('github_link')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- creation date --}}
                <div class="mb-3">
                    <label for="creation_date" class="form-label"><strong>Creation date</strong></label>
                    <input type="date" class="form-control @error('creation_date') is-invalid @enderror"
                        name="creation_date" id="creation_date" aria-describedby="creation_dateHelper"
                        value="{{ old('creation_date', date('Y-m-d')) }}" />
                    <small id="creation_dateHelper" class="form-text text-muted">Add the date the project was
                        created</small>
                    @error('creation_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- description --}}
                <div class="mb-3">
                    <label for="description"
                        class="form-label @error('description') is-invalid @enderror"><strong>Description</strong></label>
                    <textarea class="form-control" name="description" id="description" placeholder="A brief text describing the project"
                        rows="8">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Add project</button>


            </form>
        </div>

    </section>
@endsection
