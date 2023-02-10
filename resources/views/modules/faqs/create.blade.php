@extends('layout.layout')

@section('title', 'Create FAQ')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Create FAQ </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">FAQs</a></li>
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
                        <form class="forms-sample" action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="question">Question</label>
                                        <input type="text" class="form-control" id="question"
                                            placeholder="e.g., What is what?">
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="answer">Answer</label>
                                        <textarea class="form-control" name="answer" id="answer" rows="4"></textarea>
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
