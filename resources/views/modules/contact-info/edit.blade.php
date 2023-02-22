@extends('layout.layout')

@section('title', 'Edit Contact')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Contact </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Contact Info</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Contact</li>
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

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Title" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Email" value="">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Phone" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" class="form-control" id="mobile"
                                        placeholder="Mobile" value="">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="addressLineOne" class="col-sm-3 col-form-label">Address Line 1</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address_line_one" class="form-control" id="addressLineOne"
                                        placeholder="Address line 1" value="">
                                    <small class="text-muted">Street address, P.O. box, company name</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="addressLineTwo" class="col-sm-3 col-form-label">Address Line 2</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address_line_two" class="form-control" id="addressLineTwo"
                                        placeholder="Address line 2" value="">
                                    <small class="text-muted">Apartment, suite, unit building, floor, etc.</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" name="city" class="form-control" id="city"
                                        placeholder="City" value="">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="state" class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" name="state" class="form-control" id="state"
                                        placeholder="State" value="">
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="country" class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-5">
                                    <input type="text" name="country" class="form-control" id="country"
                                        placeholder="Country" value="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="post_code" class="form-control" id="post_code"
                                        placeholder="Zip/Postal code" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="map" class="col-sm-3 col-form-label">Embed a Map</label>
                                <div class="col-sm-9">
                                    <input type="text" name="map" class="form-control" id="map"
                                        placeholder="Google map" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <label for="headOffice" class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type"
                                                id="headOffice" value="head office"> Head Office </label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <label for="subOffice" class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type"
                                                id="subOffice" value="sub office"> Sub Office </label>
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
