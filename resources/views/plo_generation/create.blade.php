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
                    <h4 class="card-title mb-4">PLO GENERATION</h4>

                    <form action="/add-plo-generation" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.includes.message')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-4">
                                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Choose Course</label>
                                    <div class="col-sm-9">
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
                            <div class="col-md-6">
                                <div class="row mb-4">
                                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Choose Course Code</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="course_code">
                                            <option value="">SELECT</option>
                                            <option value="ENG-11">ENG-11</option>
                                            <option value="LIT-11">LIT-11</option>
                                            <option value="CF-11">CF-11</option>
                                            <option value="C-11">C-11</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-4">
                                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Student Id</label>
                                    <div class="col-sm-9">
                                     <input type="text" class="form-control" name="student_id">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-4">
                                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Semester</label>
                                    <div class="col-sm-9">
                                     <input type="text" class="form-control" name="semester">
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">SELECT THE WEIGHTAGE FOR THE COURSE</button>
                                </div>
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
