@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">ADD PLO</h4>

                    {{-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/plo-generation">All PLO</a></li>
                        </ol>
                    </div> --}}

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h4 class="card-title mb-4">PLO GENERATION</h4>
                    </center>

                    <form action="/add-plo-generation" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.includes.message')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Choose The Course</span>
                                    </div>
                                    <select class="form-select" name="course_title">
                                        <option value="">SELECT</option>
                                        <option value="English">English</option>
                                        <option value="Literature">Literature</option>
                                        <option value="Computer Fundamentals">Computer Fundamentals</option>
                                        <option value="C Programming">C Programming</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mb-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Course Code</span>
                                        </div>
                                        <select class="form-select" name="course_id">
                                            <option value="">SELECT</option>
                                            <option value="1">ENG-11</option>
                                            <option value="2">LIT-11</option>
                                            <option value="3">CF-11</option>
                                            <option value="4">C-11</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>







                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <center>
                                    <button type="submit" class="btn btn-primary w-md">SELECT THE WEIGHTAGE FOR THE COURSE</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

@endsection
