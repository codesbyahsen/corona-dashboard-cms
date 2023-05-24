@extends('admin.layout.app')

@section('title', 'Edit Blog Category')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Blog Category </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.blog.categories') }}">Blog Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Blog Category</li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Default form</h4> --}}
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample" action="{{ route('admin.blog.categories.update', $blogCategory->id) }}"
                            method="POST">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="categoryName">Category Name</label>
                                        <input type="text" name="name" class="form-control" id="categoryName"
                                            value="{{ old('name', $blogCategory->name ?? '') }}"
                                            placeholder="Category name" />
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3 float-right">
                                <a href="{{ route('admin.blog.categories') }}"
                                    class="btn btn-outline-secondary btn-md mr-2">
                                    Cancel </a>
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
