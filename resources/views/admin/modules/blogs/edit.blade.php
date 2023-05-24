@extends('admin.layout.app')

@section('title', 'Edit Blog')

@section('injected-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/summernote/dist/summernote-bs4.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Blog </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.blogs') }}">Blogs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Default form</h4> --}}
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample" action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="row justify-content-center" style="height: 300px;">
                                <img src="{{ $blog?->image ?? '' }}" style="max-height: 100%; max-width: 100%;"
                                    alt="{{ $blog?->title ?? '' }}" title="Current blog image" />
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="dropify" />
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Category &#40;ies&#41; <span class="text-danger">*</span></label>
                                        <select name="category[]" class="dropdown-select-multiple" multiple="multiple"
                                            style="width:100%">
                                            @foreach ($blogCategories as $key => $blogCategory)
                                                <option value="{{ $blogCategory->id }}" @selected(isset($blog?->blogCategories[$key]['id']) == $blogCategory->id)>
                                                    {{ $blogCategory->name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="heading">Heading <span class="text-danger">*</span></label>
                                        <input type="text" name="heading" class="form-control" id="heading"
                                            placeholder="Heading" value="{{ old('heading', $blog?->heading ?? '') }}" />
                                        @error('heading')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="category">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Title" value="{{ old('title', $blog?->title ?? '') }}" />
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="subTitle">Sub Title</label>
                                        <input type="text" name="sub_title" class="form-control" id="subTitle"
                                            placeholder="Sub title"
                                            value="{{ old('sub_title', $blog?->sub_title ?? '') }}" />
                                        @error('sub_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="quote">Quote</label>
                                        <textarea class="form-control" name="quote" id="quote" rows="4">{{ old('quote', $blog?->quote ?? '') }}</textarea>
                                        @error('quote')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="summernote" rows="4">{!! old('description', $blog?->description ?? '') !!}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3 float-right">
                                <a href="{{ route('admin.blogs') }}"
                                    class="btn btn-outline-secondary btn-md mr-2">Cancel </a>
                                <button type="submit" class="btn btn-primary btn-icon-text">
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
    <script src="{{ asset('assets/vendors/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                tabsize: 2
            });
        });

        $('.dropify').dropify();
    </script>
@endpush
