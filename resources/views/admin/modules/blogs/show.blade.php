@extends('admin.layout.app')

@section('title', 'Blog Details')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Blog Details </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.blogs') }}">Blogs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.blogs') }}" title="Back" class="mb-3">
                                <i class="mdi mdi-arrow-left"></i>
                            </a>
                            <span class="timestamp text-muted" title="Created: {{ $blog->updated_at->format('d-M-Y') ?? '' }}">Updated:
                                {{ $blog->updated_at->diffForHumans() ?? '' }}</span>
                        </div>
                        <div class="py-3 d-flex justify-content-between">
                            <a href="{{ route('admin.blogs.edit', encrypt($blog->id)) }}" class="btn btn-dark btn-icon-text"
                                title="Edit">
                                <i class="mdi mdi-square-edit-outline btn-icon-append"></i>
                            </a>

                            <form action="{{ route('admin.blogs.update.status', $blog->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <input type="text" name="status"
                                    value="{{ $blog->is_active == config('constants.BLOG_STATUS_ACTIVE') ? config('constants.BLOG_STATUS_INACTIVE') : config('constants.BLOG_STATUS_ACTIVE') }}"
                                    hidden />
                                <button type="submit" style="border: none; background: none;">
                                    <span
                                        class="badge rounded-pill {{ $blog->is_active == config('constants.BLOG_STATUS_ACTIVE') ? 'btn-inverse-success' : 'btn-inverse-danger' }}">{{ $blog->is_active == config('constants.BLOG_STATUS_ACTIVE') ? 'Active' : 'Disabled' }}
                                    </span>
                                </button>
                            </form>
                        </div>
                        <div class="row pt-4">
                            @isset($blog?->image)
                                <div class="col-12 text-center">
                                    <img src="{{ $blog?->image ?? '' }}" class="img-fluid" alt="{{ $blog?->title ?? '' }}"
                                        style="height: 300px" />
                                </div>
                            @endisset
                        </div>
                        <div class="row pt-3">
                            <div class="col-12">
                                <small class="font-weight-light text-muted">Heading: {{ $blog->heading ?? '' }}</small>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-6">
                                <label for="title" class="font-weight-light d-block">Title:</label>
                                <p id="title">{{ $blog->title ?? '' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="subTitle" class="font-weight-light d-block">Sub Title:</label>
                                <p id="subTitle">{{ $blog->sub_title ?? '' }}</p>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-12">
                                <label for="categories" class="font-weight-light d-block">Categories:</label>
                                @foreach ($blog->blogCategories as $blogCategories)
                                    <span id="categories">{{ $blogCategories->name . ',' ?? '' }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-12">
                                <label for="quote" class="font-weight-light d-block">Quote:</label>
                                <p id="quote">
                                <blockquote class="font-italic">
                                    <span class="mdi mdi-format-quote-open"></span>
                                    {{ $blog->quote ?? '' }}
                                    <span class="mdi mdi-format-quote-close"></span>
                                </blockquote>
                                </p>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-12">
                                <label for="description" class="font-weight-light d-block">Description:</label>
                                <p id="description">
                                    {!! $blog->description ?? '' !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
