@extends('layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/">Dashboards</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">PLO GENERATION</h4>

                        <form action="/get-plo-generation-table" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('admin.includes.message')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-4">
                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Choose Course Code</label>
                                        <div class="col-sm-6">
                                            <select

                                                class="form-select course-code"
                                                name="course_code">
                                                <option value="">SELECT</option>
                                                @php
                                                    $courses = App\Courses::all();
                                                @endphp
                                                @foreach($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->course_code}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div class="row justify-content-end">
                                <div class="col-sm-8">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Report</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>

            </div>
            <!-- end row -->
            <br><br>
            <div class="row">

            </div>

        </div>
        <!-- container-fluid -->
    </div>





@endsection
