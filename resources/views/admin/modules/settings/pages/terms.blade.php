@extends('admin.layout.app')

@section('title', 'Terms & Conditions')

@section('inject-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/summernote/dist/summernote-bs4.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Terms & Conditions </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Terms</li>
                </ol>
            </nav>
        </div>

        <x-pages-navigation />

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @isset($terms?->created_at)
                            <span class="timestamp text-muted" title="Created: {{ $terms?->created_at->format('d-M-Y') }}">
                                Updated: {{ $terms?->updated_at->diffForHumans() }}
                            </span>
                        @endisset
                        <form class="forms-sample" action="{{ route('admin.terms.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">Title <span
                                                class="text-muted small">&#40;optional&#41;</span></label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" value="{{ old('title', $terms?->title) }}">
                                        @error('title')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mt-2">
                                    <div class="form-group">
                                        <label for="description">Description <span class="text-danger"
                                                title="Required">*</span></label>
                                        <textarea class="form-control" name="description" id="summernote" rows="4" placeholder="Description">{!! old('description', $terms?->description) !!}</textarea>
                                        @error('description')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3">
                                <button type="submit" class="btn btn-primary btn-icon-text ml-auto">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@push('injected-scripts')
    <script src="{{ asset('assets/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                tabsize: 2
            });
        });
    </script>
@endpush
