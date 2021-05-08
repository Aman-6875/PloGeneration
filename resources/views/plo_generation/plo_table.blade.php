@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{ $course_code }}</h4>

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

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered border-primary mb-0">

                                            <thead>
                                                <tr>
                                                    <th>Student ID</th>

                                                    @for ($i=1;$i<=10;$i++)
                                                    <th>PLO {{$i}}</th>
                                                    @endfor
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                <tr>

                                                    <td>
                                                        {{ $data->student_id }}
                                                     </td>
                                                     @for ($i=1;$i<=10;$i++)
                                                     <td>

                                                         @if ($data->col_one_plo=='PLO '.$i)
                                                           {{ $data->col_one_plo_avg }}
                                                         @elseif ($data->col_two_plo=='PLO '.$i)
                                                           {{ $data->col_two_plo_avg }}
                                                         @elseif ($data->col_three_plo=='PLO '.$i)
                                                           {{ $data->col_three_plo_avg }}
                                                         @endif

                                                     </td>
                                                     @endfor


                                                </tr>
                                                @endforeach






                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <canvas id="marksChart" width="600" height="400"></canvas>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
<script>

    var marksCanvas = document.getElementById("marksChart");

    var marksData = {
    labels: ["English", "Maths", "Physics", "Chemistry", "Biology", "History"],
    datasets: [{
        label: "Student A",
        backgroundColor: "rgba(200,0,0,0.2)",
        data: [65, 75, 70, 80, 60, 80]
    }, {
        label: "Student B",
        backgroundColor: "rgba(0,0,200,0.2)",
        data: [54, 65, 60, 70, 70, 75]
    }]
    };

var radarChart = new Chart(marksCanvas, {
  type: 'radar',
  data: marksData
});
</script>

@endsection
