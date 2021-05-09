@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Input Marks Based On CLO</h4>

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
                        {{-- <h3 class="mb-4">{{ $course_id }}</h3> --}}
                    </center>
                    <form action="/save-clo-generation" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.includes.message')
{{--                        <input type="hidden" name="course_title" value="{{ $course_title }}">--}}
                        {{-- <input type="hidden" name="course_id" value="{{ $course_id }}"> --}}
{{--                        <input type="hidden" name="student_id" value="{{ $student_id }}">--}}
{{--                        <input type="hidden" name="semester" value="{{ $semester }}">--}}
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered border-primary mb-0">

                                                <thead>
                                                    {{-- @dd($datas); --}}
                                                    <tr>
                                                        <th>Student Name</th>
                                                        @foreach($datas[0]['marking_parameter'] as $marking_parameter)
                                                           @if ($marking_parameter!=null)
                                                             @php

                                                                $parameter_name =  App\MarkingParameter::where('id',$marking_parameter)->first();
                                                             @endphp
                                                              <th>{{$parameter_name->name}}</th>

                                                           @endif


                                                        @endforeach
                                                        <th>Total%</th>
                                                    </tr>
                                                </thead>
                                                {{-- @dd($datas) --}}
                                                <tbody>
                                                @php
                                                    $students = App\User::where('user_role','Student')->get();
                                                    $i = 0;
                                                @endphp
                                                  {{-- @dd($datas) --}}
                                                 @foreach ($students as $student)
                                                 <tr>

                                                    <td>{{ $student->first_name }}</td>
                                                    @foreach($datas[0]['marking_parameter'] as $marking_parameter)
                                                    @if ($marking_parameter!= null)
                                                    <td>

                                                        @foreach ($datas as $data)
                                                            <input class="form-control" type="number"name="marks[]"><br>
                                                            <input class="form-control" type="hidden"name="clo_id[]" value="{{$data['clo_id']}}">
                                                            <input class="form-control" type="hidden"name="plo_id[]" value="{{$data['plo_id']}}">
                                                            <input class="form-control" type="hidden"name="course_id" value="{{ $data['course_id'] }}">
                                                            <input class="form-control" type="hidden"name="marking_parameter[]" value="{{ $marking_parameter }}">
                                                            <input class="form-control" type="hidden"name="student_id[]" value="{{ $student->user_id }}">
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endforeach

                                                    </td>
                                                    @endif
                                                    @endforeach

                                                </tr>
                                                 @endforeach





                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-sm-9">
                                <center>
                                    <button type="submit" class="btn btn-primary w-50">Save</button>
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
