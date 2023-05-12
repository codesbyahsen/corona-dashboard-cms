@extends('admin.layout.app')

@section('title', 'Create FAQ')

@section('injected-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Create FAQ </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.faqs') }}">FAQs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create FAQ</li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Default form</h4> --}}
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample" action="{{ route('admin.faqs.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="faq-category">Faq Category <span class="text-danger">*</span></label>
                                        <select class="dropdown-select-single" name="faq_category_id" id="faq-category"
                                            style="width:100%">
                                            <option value="">Select</option>
                                            @foreach ($faqCategories as $faqCategory)
                                                <option value="{{ $faqCategory?->id }}">{{ $faqCategory?->name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('faq_category_id')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="question">Question <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="question" id="question"
                                            placeholder="e.g., What is what?">
                                        @error('question')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="answer">Answer <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="answer" id="summernote" rows="4"></textarea>
                                        @error('answer')
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
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
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
