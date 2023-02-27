@extends('layout.layout')

@section('title', 'Create Blog')

@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/summernote/dist/summernote-bs4.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Create Blog </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('faqs') }}">Blogs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Blog</li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Default form</h4> --}}
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample" action="#">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category" class="js-example-basic-multiple" multiple="multiple" style="width:100%">
                                          <option value="AL">Alabama</option>
                                          <option value="WY">Wyoming</option>
                                          <option value="AM">America</option>
                                          <option value="CA">Canada</option>
                                          <option value="RU">Russia</option>
                                        </select>
                                      </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="heading">Heading</label>
                                        <input type="text" name="heading" class="form-control" id="heading"
                                            placeholder="Heading">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="category">Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Title">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="subTitle">Sub Title</label>
                                        <input type="text" name="sub_title" class="form-control" id="subTitle"
                                            placeholder="Sub title">
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="quote">Quote</label>
                                        <textarea class="form-control" name="quote" id="quote" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="summernote" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3">
                                <button type="button" class="btn btn-primary btn-icon-text ml-auto">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')
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
    </script>
@endpush
