@extends('layout.layout')

@section('title', 'Contact Information')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Contact Information </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Information</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="dropdown mb-4 pr-2 float-right" title="Add new">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="mdi mdi-plus"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                      <a class="dropdown-item" href="#">Add/Edit Head Office</a>
                      <a class="dropdown-item" href="#">Add Sub Office</a>
                    </div>
                  </div>

                {{-- <a href="#" class="float-right pr-2 pb-2"><i class="mdi mdi-plus"></i></a> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Head Office</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Head Office</td>
                                        <td>009253275535</td>
                                        <td>headoffice@mail.com</td>
                                        <td><button type="button" class="btn btn-inverse-success btn-rounded btn-fw">Active</button></td>
                                        <td>
                                            <a href="#" title="View details"><i class="mdi mdi-file-eye"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sub Offices</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sub Office</td>
                                        <td>009253275535</td>
                                        <td>headoffice@mail.com</td>
                                        <td><button type="button" class="btn btn-inverse-danger btn-rounded btn-fw">Disabled</button></td>
                                        <td>
                                            <a href="#" title="View details"><i class="mdi mdi-file-eye"></i></a>
                                            <a href="#" title="Edit"><i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="#" title="Delete"><i class="mdi mdi-delete-outline"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
