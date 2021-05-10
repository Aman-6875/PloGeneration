@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Input Marks Based On CLO</h4>



                </div>
            </div>
        </div>


        <div class="row">
            <div class="card">
                <div class="card-body">
                    <center>
                        {{-- <h3 class="mb-4">{{ $course_id }}</h3> --}}
                    </center>
                    <form action="/save-clo-generation" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.includes.message')
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered border-primary mb-0">

                                                <thead>

                                                    <tr>
                                                        <th>Student Name</th>
                                                        @foreach($datas[0]['marking_parameter'] as $marking_parameter)
                                                           @if ($marking_parameter!=null)
                                                             @php

                                                                $parameter_name =  App\MarkingParameter::where('id',$marking_parameter)->first();
                                                             @endphp
                                                            @if ($parameter_name->id == 10)
                                                            @for ($k=1;$k<=6;$k++){
                                                                <th>{{$parameter_name->name}}.{{ $k }}</th>
                                                            }
                                                            @endfor

                                                            @else
                                                            <th>{{$parameter_name->name}}</th>
                                                            @endif



                                                           @endif


                                                        @endforeach
                                                        <th>Total%</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                @php
                                                    $students = App\User::where('user_role','Student')->get();
                                                    $i = 0;
                                                @endphp

                                                 @foreach ($students as $student)
                                                 <tr>

                                                    <td>{{ $student->first_name }}</td>
                                                    @foreach($datas[0]['marking_parameter'] as $marking_parameter)
                                                    @if ($marking_parameter!= null)
                                                    @if($marking_parameter == 10)
                                                    @for($j=0; $j<6; $j++)
                                                             <td>
                                                                 @foreach ($datas as $clo_index => $data)
                                                                     <input
                                                                         id="clo-{{$student->id}}-{{$data['clo_id']}}"
                                                                         class="form-control"
                                                                         type="number"
                                                                         name="marks[]"
                                                                         placeholder="{{"CLO-".$data['clo_id']}}"
                                                                         onchange="adjustTotal({{$student->id}},{{$data['clo_id']}},{{$marking_parameter}},{{json_encode($data)}})"
                                                                     <?php
                                                                         $marking_parameter_index = array_search($marking_parameter,$data['marking_parameter']);
                                                                         $given_mark = $data['input_number'][$marking_parameter_index];
                                                                         if (!$given_mark) echo 'readonly';
                                                                         ?>
                                                                     ><br>
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
                                                     @endfor
                                                 @else
                                                         <td>
                                                             @foreach ($datas as $clo_index => $data)
                                                                 <input
                                                                     id="clo-{{$student->id}}-{{$data['clo_id']}}"
                                                                     class="form-control"
                                                                     type="number"
                                                                     name="marks[]"
                                                                     placeholder="{{"CLO-".$data['clo_id']}}"
                                                                     onchange="adjustTotal({{$student->id}},{{$data['clo_id']}},{{$marking_parameter}},{{json_encode($data)}})"
                                                                 <?php
                                                                     $marking_parameter_index = array_search($marking_parameter,$data['marking_parameter']);
                                                                     $given_mark = $data['input_number'][$marking_parameter_index];
                                                                     if (!$given_mark) echo 'readonly';
                                                                     ?>
                                                                 ><br>
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

                                                    @endif
                                                 @endforeach
                                        <td>
                                        @foreach ($datas as $d)
                                        <input
                                        class="form-control"
                                        id="total-{{$student->id}}-{{$d['clo_id']}}"
                                        type="number" readonly><br>
                                        @endforeach
                                        </td>
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

                            <script>
                            function adjustTotal(student_id,id,marking_parameter,data){
                            let element_value = document.getElementById('clo-'+student_id+'-'+id)
                            let element_total = document.getElementById('total-'+student_id+'-'+id)
                                let is_okay = cloValidation(marking_parameter,data,parseFloat(element_value.value))
                                if (!is_okay) element_value.value = ''
                            let total_value = parseFloat(element_total.value)
                            if (isNaN(total_value)) total_value = 0
                            total_value+= parseFloat(element_value.value)
                            element_total.value = total_value
                            }

                            function cloValidation(marking_parameter,data,value)
                            {
                                let marking_parameters = data.marking_parameter
                                let input_numbers = data.input_number
                                let marking_param_index = marking_parameters.indexOf(String(marking_parameter))
                                if (value > input_numbers[marking_param_index]){
                                    alert('Value can not be greater than '+ input_numbers[marking_param_index]);
                                    return false
                                }
                                return true

                            }
                            </script>
                            @endsection
