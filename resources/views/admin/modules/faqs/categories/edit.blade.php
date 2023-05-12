@extends('admin.layout.app')

@section('title', 'Edit FAQ Category')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit FAQ Category </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.faq_categories') }}">FAQ Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit FAQ Category</li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Default form</h4> --}}
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample" action="{{ route('admin.faq_categories.update', $faqCategory?->id) }}"
                            method="POST">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="text" class="form-control" name="name" id="category"
                                            value="{{ old('name', $faqCategory?->name ?? '') }}"
                                            placeholder="e.g., Services">
                                        @error('name')
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
