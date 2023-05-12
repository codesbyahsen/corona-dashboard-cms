@extends('admin.layout.app')

@section('title', 'Show FAQ')

@section('injected-links')
    <style>
        #answer>div {
            white-space: break-spaces !important;
        }
    </style>
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Show FAQ </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.faqs') }}">FAQs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show FAQ</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.faqs') }}" title="Back" class="mb-3">
                                <i class="mdi mdi-arrow-left"></i>
                            </a>
                            <span class="timestamp text-muted" title="Created: {{ $faq?->created_at->format('d-M-Y') }}">Updated: {{ $faq?->updated_at->diffForHumans() ?? '' }}</span>
                        </div>

                        <div class="py-3 d-flex justify-content-between">
                            <a href="{{ route('admin.faqs.edit', encrypt($faq->id)) }}" class="btn btn-dark btn-icon-text"
                                title="Edit">
                                <i class="mdi mdi-square-edit-outline btn-icon-append"></i>
                            </a>

                            <form action="{{ route('admin.faqs.update.status', $faq?->id) }}" method="POST"
                                title="{{ $faq?->is_active == config('constants.FAQ_STATUS_ACTIVE') ? 'Click to disable' : 'Click to active' }}">
                                @csrf @method('PATCH')
                                <input type="text" name="status"
                                    value="{{ $faq?->is_active == config('constants.FAQ_STATUS_ACTIVE') ? config('constants.MAIL_CONFIGURATION_STATUS_INACTIVE') : config('constants.FAQ_STATUS_ACTIVE') }}"
                                    hidden />
                                <button type="submit" style="border: none; background: none;">
                                    <span
                                        class="badge rounded-pill {{ $faq?->is_active == config('constants.FAQ_STATUS_ACTIVE') ? 'btn-inverse-success' : 'btn-inverse-danger' }}">
                                        {{ $faq?->is_active == config('constants.FAQ_STATUS_ACTIVE') ? 'Active' : 'Disabled' }}
                                    </span>
                                </button>
                            </form>
                        </div>

                        <div class="row pt-3">
                            <div class="col-12">
                                <label for="category" class="font-weight-light d-block">Category:</label>
                                <p id="category">{{ $faq?->faqCategory?->name ?? '' }}</p>
                            </div>
                            <div class="col-12 pt-2">
                                <label for="question" class="font-weight-light d-block">Question:</label>
                                <p id="question">{{ $faq?->question ?? '' }}</p>
                            </div>
                            <div class="col-12 pt-2">
                                <label for="answer" class="font-weight-light d-block">Answer:</label>
                                <span id="answer">{!! $faq?->answer ?? '' !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
