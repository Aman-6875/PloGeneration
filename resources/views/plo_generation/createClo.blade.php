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
                    <center>
                        <h3 class="mb-4">{{
                            \App\Courses::find($course_id)->course_code
                        }}</h3>
                    </center>
                    <form action="/save-plo-generation" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.includes.message')
{{--                        <input type="hidden" name="course_title" value="{{ $course_title }}">--}}
                        <input type="hidden" name="course_id" value="{{ $course_id }}">
{{--                        <input type="hidden" name="student_id" value="{{ $student_id }}">--}}
{{--                        <input type="hidden" name="semester" value="{{ $semester }}">--}}
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered border-primary mb-0">

                                                <thead>
                                                    <tr>
                                                        <th>Course Learning Outcome</th>
                                                        @foreach($clos as $clo)
                                                            <th>{{$clo->name}}</th>
                                                        @endforeach
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Program learning outcome</th>
                                                        <td>
                                                            <select class="form-select" name="col_one_plo">
                                                                <option value="">SELECT PLO</option>
                                                                @foreach ($plos as $plo)
                                                                    <option value="{{$plo->id}}">{{$plo->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select" name="col_two_plo">
                                                                <option value="">SELECT PLO</option>
                                                                @foreach ($plos as $plo)
                                                                    <option value="{{$plo->id}}">{{$plo->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select" name="col_three_plo">
                                                                <option value="">SELECT PLO</option>
                                                                  @foreach ($plos as $plo)
                                                                    <option value="{{$plo->id}}">{{$plo->name}}</option>
                                                                  @endforeach
                                                            </select>
                                                        </td>
                                                        <td>Weightage %</td>
                                                    </tr>

                                                 @for ($i=1;$i<10;$i++)
                                                 <tr>
                                                    <th scope="row">
                                                         <select class="form-select" name="marking_parameters[]">
                                                            <option value="">SELECT</option>
                                                             @foreach($parameters as $parameter)
                                                                 <option  value="{{$parameter->id}}">{{$parameter->name}}</option>
                                                             @endforeach
                                                       </select>
                                                    </th>
                                                    <td>
                                                        <input
                                                            class="form-control"
                                                            type="number"
                                                            name="col_one_input[]"
                                                            id="mark-clo-one-{{$i}}"
                                                            onchange="checkWeightage({{$i}})">
                                                    </td>
                                                    <td>
                                                        <input
                                                            class="form-control"
                                                            type="number"
                                                            id="mark-clo-two-{{$i}}"
                                                            name="col_two_input[]"
                                                            onchange="checkWeightage({{$i}})">
                                                    </td>
                                                    <td>
                                                        <input
                                                            class="form-control"
                                                            type="number"
                                                            id="mark-clo-three-{{$i}}"
                                                            name="col_three_input[]"
                                                            onchange="checkWeightage({{$i}})">
                                                    </td>
                                                    <td>
                                                        <input
                                                            class="form-control"
                                                            type="number"
                                                            id="weightage-{{$i}}"
                                                            onchange="calculateTotal()"
                                                            name="weightage[]">
                                                    </td>
                                                </tr>
                                                 @endfor



                                                   <tr>
                                                        <th scope="row">
                                                             Total %
                                                        </th>
                                                        <td>
                                                            <input
                                                                id="total-clo-one"
                                                                class="form-control"
                                                                type="text"
                                                                name="col_one_input[]"
                                                                readonly>
                                                        </td>
                                                        <td>
                                                            <input
                                                                id="total-clo-two"
                                                                class="form-control"
                                                                type="text"
                                                                name="col_two_input[]"
                                                                readonly>
                                                        </td>
                                                        <td>
                                                            <input
                                                                id="total-clo-three"
                                                                class="form-control"
                                                                type="text"
                                                                name="col_three_input[]"
                                                                readonly>
                                                        </td>
                                                        <td>
                                                            <input
                                                                id="total-weightage"
                                                                class="form-control"
                                                                type="text"
                                                                name="weightage[]"
                                                                readonly>
                                                        </td>
                                                    </tr>
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
    function checkWeightage(index)
    {
        let weightage = document.getElementById('weightage-'+index);
        if (!weightage.value.length) alert('Enter the weightage first');
        let clo_one_plo_value = document.getElementById('mark-clo-one-'+index);
        let clo_two_plo_value = document.getElementById('mark-clo-two-'+index);
        let clo_three_plo_value = document.getElementById('mark-clo-three-'+index);

        if (clo_one_plo_value.value.length > 0 &&
            clo_two_plo_value.value.length > 0 &&
            clo_three_plo_value.value.length > 0)
        {
            if ((parseFloat(clo_one_plo_value.value)+
                parseFloat(clo_two_plo_value.value)+
                parseFloat(clo_three_plo_value.value)) !== parseFloat(weightage.value))
            {
                alert('Invalid entry')
                clo_one_plo_value.value = ''
                clo_two_plo_value.value = ''
                clo_three_plo_value.value = ''
            }
        }
        calculateTotal();

    }

    function calculateTotal()
    {
        let total_clo_one_plo = 0;
        let total_clo_two_plo = 0;
        let total_clo_three_plo = 0;
        let total_weightage = 0;
        for(let index = 1; index < 10; index++){
            let weightage = document.getElementById('weightage-'+index);
            let clo_one_plo_value = document.getElementById('mark-clo-one-'+index);
            let clo_two_plo_value = document.getElementById('mark-clo-two-'+index);
            let clo_three_plo_value = document.getElementById('mark-clo-three-'+index);
            if (!isNaN(parseFloat(clo_one_plo_value.value)))
                total_clo_one_plo += parseFloat(clo_one_plo_value.value)
            if (!isNaN(parseFloat(clo_two_plo_value.value)))
                total_clo_two_plo += parseFloat(clo_two_plo_value.value)
            if (!isNaN(parseFloat(clo_three_plo_value.value)))
                total_clo_three_plo += parseFloat(clo_three_plo_value.value)
            if (!isNaN(parseFloat(weightage.value)))
                total_weightage += parseFloat(weightage.value)

        }

        document.getElementById('total-clo-one').value = total_clo_one_plo
        document.getElementById('total-clo-two').value = total_clo_two_plo
        document.getElementById('total-clo-three').value = total_clo_three_plo
        document.getElementById('total-weightage').value = total_weightage

    }
</script>

@endsection
