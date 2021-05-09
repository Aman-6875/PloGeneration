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
                                    <select
                                        id="course_name"
                                        class="form-select"
                                        name="course_name"

                                    >
                                        <option value="">SELECT</option>
                                        @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{$course->title}}</option>
                                        @endforeach
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
                                        <select
                                            id="course_code"
                                            class="form-select"
                                            name="course_id">
                                            <option value="">SELECT</option>
                                            @foreach($courses as $course)
                                                <option value="{{$course->id}}">{{$course->course_code}}</option>
                                            @endforeach
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
    <script>
        let courses = {!! $courses !!};
        let element = document.getElementById('course_name');
        element.onchange = function (e){
            let course = courses.find((course) => course.id === parseInt(this.value));
            document.getElementById('course_code').value = course.id
        }
    </script>

@endsection
