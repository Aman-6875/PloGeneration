@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{ $course_code }}</h4>

                     <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/plo-generation">All PLO</a></li>
                        </ol>
                    </div>

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
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-primary mb-0">

                                                    <thead>
                                                        <tr>
                                                            <th>GPA</th>
                                                            <td>
                                                                @php
                                                                 $gpa = ($avg1+$avg2+$avg2+$avg4+$avg5+$avg6+$avg7+$avg8+$avg9+$avg10)/10;
                                                                @endphp
                                                                {{ $gpa }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>CGPA</th>
                                                            <td>0</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>








                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="col-md-10">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-primary mb-0">

                                                    <thead>
                                                        <tr>
                                                            <th></th>

                                                            @for ($i=1;$i<=10;$i++)
                                                            <th>PLO {{$i}}</th>
                                                            @endfor
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>

                                                            <td>
                                                                GPA
                                                             </td>

                                                             <td>
                                                                @if ($avg1!=0)
                                                                 {{ $avg1 }}
                                                                @endif
                                                             </td>
                                                             <td>
                                                                @if ($avg2!=0)
                                                                 {{ $avg2 }}
                                                                @endif
                                                             </td>
                                                             <td>
                                                                @if ($avg3!=0)
                                                                 {{ $avg3 }}
                                                                @endif
                                                             </td>
                                                             <td>
                                                                @if ($avg4!=0)
                                                                 {{ $avg4 }}
                                                                @endif
                                                             </td>
                                                             <td>
                                                                @if ($avg5!=0)
                                                                 {{ $avg5 }}
                                                                @endif
                                                             </td>
                                                             <td>
                                                                @if ($avg6!=0)
                                                                 {{ $avg6 }}
                                                                @endif
                                                             </td>
                                                             <td>
                                                                @if ($avg7!=0)
                                                                 {{ $avg7 }}
                                                                @endif
                                                             </td>
                                                             <td>
                                                                @if ($avg8!=0)
                                                                 {{ $avg8 }}
                                                                @endif
                                                             </td>
                                                             <td>
                                                                @if ($avg9!=0)
                                                                 {{ $avg9 }}
                                                                @endif
                                                             </td>
                                                             <td>
                                                                @if ($avg10!=0)
                                                                 {{ $avg10 }}
                                                                @endif
                                                             </td>

                                                        </tr>
                                                        <tr>
                                                            <td>CGPA</td>

                                                                @for ($j=0;$j<10;$j++)
                                                                        <td>
                                                                        </td>


                                                                    @endfor

                                                        </tr>





                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

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
