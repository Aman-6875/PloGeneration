@extends('layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">ADD Course</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h4 class="card-title mb-4">Create Course</h4>
                        </center>
                        <form action="{{route('course.store')}}" class="text-center" method="POST">
                            {{csrf_field()}}
                            @include('admin.includes.message')
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Course Name</span>
                                </div>
                                <input
                                    name="course_name"
                                    class="form-control"
                                    type="text">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Course Code</span>
                                </div>
                                <input
                                    name="course_code"
                                    class="form-control"
                                    type="text">
                            </div>

                            <button class="btn btn-success w-50">
                                Create
                            </button>
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
