@extends('layout.layout')

@section('title', 'Show FAQ')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Show FAQ </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('faqs') }}">FAQs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show FAQ</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <a href="{{ url()->previous() }}" title="Back" class="mb-3">
                                <i class="mdi mdi-arrow-left"></i>
                              </a>
                            <span class="timestamp text-muted">Created: 1 minute ago</span>
                        </div>
                        <div class="row pt-3">
                            <div class="col-12">
                                <label for="question" class="font-weight-light d-block">Question:</label>
                                <p id="question">Question</p>
                            </div>
                            <div class="col-12 pt-2">
                                <label for="answer" class="font-weight-light d-block">Answer:</label>
                                <p id="answer">This is the detailed answer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
