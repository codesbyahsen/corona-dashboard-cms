@extends('layout.layout')

@section('title', 'Edit Blog')

@section('extra-links')
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
                    <li class="breadcrumb-item"><a href="{{ route('blogs') }}">Blogs</a></li>
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
                        <form class="forms-sample" action="{{ route('blogs.update', encrypt($blog->id)) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="dropify" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Category &#40;ies&#41; <span class="text-danger">*</span></label>
                                        <select name="category" class="js-example-basic-multiple" multiple="multiple"
                                            style="width:100%">
                                            @foreach ($blogCategories as $blogCategory)
                                                <option value="{{ $blogCategory->id }}">{{ $blogCategory->name ?? '' }}
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
                                            placeholder="Heading" value="{{ $blog->heading ?? '' }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="category">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Title" value="{{ $blog->title ?? '' }}" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="subTitle">Sub Title</label>
                                        <input type="text" name="sub_title" class="form-control" id="subTitle"
                                            placeholder="Sub title" value="{{ $blog->sub_title ?? '' }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="quote">Quote</label>
                                        <textarea class="form-control" name="quote" id="quote" rows="4">{{ $blog->quote ?? '' }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="summernote" rows="4">{!! $blog->description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3">
                                <button type="submit" class="btn btn-primary btn-icon-text ml-auto">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                                <a href="{{ route('blogs') }}" class="btn btn-outline-secondary btn-md ml-2">
                                    Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')
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
