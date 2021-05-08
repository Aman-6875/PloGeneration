@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">GENERATION Distribution at Marks Based CLO-PLO</h4>

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
                    <h4 class="card-title mb-4">{{ $course_code }}</h4>

                    <form action="/save-plo-generation" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.includes.message')
                        <input type="hidden" name="course_title" value="{{ $course_title }}">
                        <input type="hidden" name="course_code" value="{{ $course_code }}">
                        <input type="hidden" name="student_id" value="{{ $student_id }}">
                        <input type="hidden" name="semester" value="{{ $semester }}">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered border-primary mb-0">

                                                <thead>
                                                    <tr>
                                                        <th>Course Learning Outcome</th>
                                                        <th>CLO 1</th>
                                                        <th>CLO 2</th>
                                                        <th>CLO 3</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Program learning outcome</th>
                                                        <td>
                                                            <select class="form-select" name="col_one_plo">
                                                                <option value="">SELECT PLO</option>
                                                                @for ($i=1;$i<=10;$i++)
                                                                <option value="PLO {{ $i }}">PLO {{ $i }}</option>

                                                                @endfor
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select" name="col_two_plo">
                                                                <option value="">SELECT PLO</option>
                                                                @for ($i=1;$i<=10;$i++)
                                                                <option value="PLO {{ $i }}">PLO {{ $i }}</option>

                                                                @endfor
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select" name="col_three_plo">
                                                                <option value="">SELECT PLO</option>
                                                                @for ($i=1;$i<=10;$i++)
                                                                <option value="PLO {{ $i }}">PLO {{ $i }}</option>

                                                                @endfor
                                                            </select>
                                                        </td>
                                                        <td>Weightage %</td>
                                                    </tr>

                                                 @for ($i=1;$i<10;$i++)
                                                 <tr>
                                                    <th scope="row">
                                                         <select class="form-select" name="plo[]">
                                                            <option value="">SELECT</option>
                                                            <option  value="Assesment1">Assaignment1</option>
                                                            <option  value="Assesment2">Assaignment2</option>
                                                            <option  value="Assesment3">Assaignment3</option>
                                                            <option value="Quiz1">Quiz1</option>
                                                            <option value="Quiz2">Quiz2</option>
                                                            <option value="Quiz3">Quiz3</option>
                                                            <option value="Quiz4">Quiz4</option>
                                                            <option value="Lab Test">Lab Test</option>
                                                            <option value="Class Test">Class Test</option>
                                                            <option value="Final Exam">Final Exam</option>
                                                            <option value="Project Report">Project Report</option>
                                                            <option value="Report">Report</option>
                                                            <option value="Presentation">Presentation</option>
                                                       </select>
                                                    </th>
                                                    <td>
                                                        <input class="form-control" type="number" name="col_one_input[]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="number" name="col_two_input[]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="number" name="col_three_input[]">
                                                    </td>
                                                    <td><input class="form-control" type="number" name="weightage[]"></td>
                                                </tr>
                                                 @endfor



                                                   <tr>
                                                        <th scope="row">
                                                             Total %
                                                        </th>
                                                        <td>
                                                            <input class="form-control" type="text" name="col_one_input[]" readonly>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text" name="col_two_input[]" readonly>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text" name="col_three_input[]" readonly>
                                                        </td>
                                                        <td><input class="form-control" type="text" name="weightage[]" readonly></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Save</button>
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