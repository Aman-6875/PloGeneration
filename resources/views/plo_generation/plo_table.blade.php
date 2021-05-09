@extends('layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{ \App\Courses::find($course_code)->course_code }}</h4>

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
                    <center>
                        <h4 class="card-title mb-4">{{ \App\Courses::find($course_code)->course_code }}</h4>
                    </center>

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
                                                                 $gpa = ($total1+$total2+$total2+$total4+$total5+$total6+$total7+$total8+$total9+$total10);
                                                                @endphp


                                                            @if($gpa>=90)
                                                                @php
                                                                    $grade1=4;
                                                                @endphp
                                                                {{ $grade1 }}
                                                            @elseif($gpa>=80 && $gpa<90)
                                                                    @php
                                                                        $grade1=4;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($gpa>=75 && $gpa<90)
                                                                    @php
                                                                        $grade1=3.7;
                                                                    @endphp
                                                                    {{ $grade1 }}

                                                            @elseif($gpa>=70 && $gpa<75)
                                                                    @php
                                                                        $grade1=3.4;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($gpa>=65 && $gpa<70)
                                                                    @php
                                                                        $grade1=3.1;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($gpa>=60 && $gpa<65)
                                                                    @php
                                                                        $grade1=2.7;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($gpa>=55 && $gpa<60)
                                                                    @php
                                                                        $grade1=2.4;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($gpa>=50 && $gpa<55)
                                                                    @php
                                                                        $grade1=2.1;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($gpa>=45 && $gpa<50)
                                                                    @php
                                                                        $grade1=1.7;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($gpa>=40 && $gpa<45)
                                                                    @php
                                                                        $grade1=1.4;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($gpa>=35 && $gpa<40)
                                                                    @php
                                                                        $grade1=1;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @else
                                                                    @php
                                                                        $grade1=0;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                             @endif


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
                                                        <th> Course Code</th>

                                                        @for ($i=1;$i<=10;$i++)
                                                            <th>PLO {{$i}}</th>
                                                        @endfor
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>GPA</td>


                                                        <td>
                                                            @if ($avg1!=0)
                                                                {{ $total1 }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($avg2!=0)
                                                                {{ $total2 }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($avg3!=0)
                                                                {{ $total3 }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($avg4!=0)
                                                                {{ $total4 }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($avg5!=0)
                                                                {{ $total5 }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($avg6!=0)
                                                                {{ $total6 }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($avg7!=0)
                                                                {{ $total7 }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($avg8!=0)
                                                                {{ $total8 }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($avg9!=0)
                                                                {{ $total9 }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($avg10!=0)
                                                                {{ $total10 }}
                                                            @endif
                                                        </td>



                                                    </tr>





                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-10">
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
                                                        @if ($total1!=0)
                                                            @if($total1>=90)
                                                                @php
                                                                    $grade1=4;
                                                                @endphp
                                                                {{ $grade1 }}
                                                            @elseif($total1>=80 && $total1<90)
                                                                    @php
                                                                        $grade1=4;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($total1>=75 && $total1<90)
                                                                    @php
                                                                        $grade1=3.7;
                                                                    @endphp
                                                                    {{ $grade1 }}

                                                            @elseif($total1>=70 && $total1<75)
                                                                    @php
                                                                        $grade1=3.4;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($total1>=65 && $total1<70)
                                                                    @php
                                                                        $grade1=3.1;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($total1>=60 && $total1<65)
                                                                    @php
                                                                        $grade1=2.7;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($total1>=55 && $total1<60)
                                                                    @php
                                                                        $grade1=2.4;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($total1>=50 && $total1<55)
                                                                    @php
                                                                        $grade1=2.1;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($total1>=45 && $total1<50)
                                                                    @php
                                                                        $grade1=1.7;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($total1>=40 && $total1<45)
                                                                    @php
                                                                        $grade1=1.4;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @elseif($total1>=35 && $total1<40)
                                                                    @php
                                                                        $grade1=1;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                            @else
                                                                    @php
                                                                        $grade1=0;
                                                                    @endphp
                                                                    {{ $grade1 }}
                                                             @endif

                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if ($total2!=0)
                                                            @if($total2>=90)
                                                                @php
                                                                    $grade2=4;
                                                                @endphp
                                                                {{ $grade2 }}
                                                            @elseif($total2>=80 && $total2<90)
                                                                    @php
                                                                        $grade2=4;
                                                                    @endphp
                                                                    {{ $grade2 }}
                                                            @elseif($total2>=75 && $total2<90)
                                                                    @php
                                                                        $grade2=3.7;
                                                                    @endphp
                                                                    {{ $grade2 }}

                                                            @elseif($total2>=70 && $total2<75)
                                                                    @php
                                                                        $grade2=3.4;
                                                                    @endphp
                                                                    {{ $grade2 }}
                                                            @elseif($total2>=65 && $total2<70)
                                                                    @php
                                                                        $grade2=3.1;
                                                                    @endphp
                                                                    {{ $grade2 }}
                                                            @elseif($total2>=60 && $total2<65)
                                                                    @php
                                                                        $grade2=2.7;
                                                                    @endphp
                                                                    {{ $grade2 }}
                                                            @elseif($total2>=55 && $total2<60)
                                                                    @php
                                                                        $grade2=2.4;
                                                                    @endphp
                                                                    {{ $grade2 }}
                                                            @elseif($total2>=50 && $total2<55)
                                                                    @php
                                                                        $grade2=2.1;
                                                                    @endphp
                                                                    {{ $grade2 }}
                                                            @elseif($total2>=45 && $total2<50)
                                                                    @php
                                                                        $grade2=1.7;
                                                                    @endphp
                                                                    {{ $grade2 }}
                                                            @elseif($total2>=40 && $total2<45)
                                                                    @php
                                                                        $grade2=1.4;
                                                                    @endphp
                                                                    {{ $grade2 }}
                                                            @elseif($total2>=35 && $total2<40)
                                                                    @php
                                                                        $grade2=1;
                                                                    @endphp
                                                                    {{ $grade2 }}
                                                            @else
                                                                    @php
                                                                        $grade2=0;
                                                                    @endphp
                                                                    {{ $grade2 }}
                                                             @endif

                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if ($total3!=0)
                                                            @if($total3>=90)
                                                                @php
                                                                    $grade3=4;
                                                                @endphp
                                                                {{ $grade3 }}
                                                            @elseif($total3>=80 && $total3<90)
                                                                    @php
                                                                        $grade3=4;
                                                                    @endphp
                                                                    {{ $grade3 }}
                                                            @elseif($total3>=75 && $total3<90)
                                                                    @php
                                                                        $grade3=3.7;
                                                                    @endphp
                                                                    {{ $grade3 }}

                                                            @elseif($total3>=70 && $total3<75)
                                                                    @php
                                                                        $grade3=3.4;
                                                                    @endphp
                                                                    {{ $grade3 }}
                                                            @elseif($total3>=65 && $total3<70)
                                                                    @php
                                                                        $grade3=3.1;
                                                                    @endphp
                                                                    {{ $grade3 }}
                                                            @elseif($total3>=60 && $total3<65)
                                                                    @php
                                                                        $grade3=2.7;
                                                                    @endphp
                                                                    {{ $grade3 }}
                                                            @elseif($total3>=55 && $total3<60)
                                                                    @php
                                                                        $grade3=2.4;
                                                                    @endphp
                                                                    {{ $grade3 }}
                                                            @elseif($total3>=50 && $total3<55)
                                                                    @php
                                                                        $grade3=2.1;
                                                                    @endphp
                                                                    {{ $grade3 }}
                                                            @elseif($total3>=45 && $total3<50)
                                                                    @php
                                                                        $grade3=1.7;
                                                                    @endphp
                                                                    {{ $grade3 }}
                                                            @elseif($total3>=40 && $total3<45)
                                                                    @php
                                                                        $grade3=1.4;
                                                                    @endphp
                                                                    {{ $grade3 }}
                                                            @elseif($total3>=35 && $total3<40)
                                                                    @php
                                                                        $grade3=1;
                                                                    @endphp
                                                                    {{ $grade3 }}
                                                            @else
                                                                    @php
                                                                        $grade3=0;
                                                                    @endphp
                                                                    {{ $grade3 }}
                                                             @endif

                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if ($total4!=0)
                                                            @if($total4>=90)
                                                                @php
                                                                    $grade4=4;
                                                                @endphp
                                                                {{ $grade4 }}
                                                            @elseif($total4>=80 && $total4<90)
                                                                    @php
                                                                        $grade4=4;
                                                                    @endphp
                                                                    {{ $grade4 }}
                                                            @elseif($total4>=75 && $total4<90)
                                                                    @php
                                                                        $grade4=3.7;
                                                                    @endphp
                                                                    {{ $grade4 }}

                                                            @elseif($total4>=70 && $total4<75)
                                                                    @php
                                                                        $grade4=3.4;
                                                                    @endphp
                                                                    {{ $grade4 }}
                                                            @elseif($total4>=65 && $total4<70)
                                                                    @php
                                                                        $grade4=3.1;
                                                                    @endphp
                                                                    {{ $grade4 }}
                                                            @elseif($total4>=60 && $total4<65)
                                                                    @php
                                                                        $grade4=2.7;
                                                                    @endphp
                                                                    {{ $grade4 }}
                                                            @elseif($total4>=55 && $total4<60)
                                                                    @php
                                                                        $grade4=2.4;
                                                                    @endphp
                                                                    {{ $grade4 }}
                                                            @elseif($total4>=50 && $total4<55)
                                                                    @php
                                                                        $grade4=2.1;
                                                                    @endphp
                                                                    {{ $grade4 }}
                                                            @elseif($total4>=45 && $total4<50)
                                                                    @php
                                                                        $grade4=1.7;
                                                                    @endphp
                                                                    {{ $grade4 }}
                                                            @elseif($total4>=40 && $total4<45)
                                                                    @php
                                                                        $grade4=1.4;
                                                                    @endphp
                                                                    {{ $grade4 }}
                                                            @elseif($total4>=35 && $total4<40)
                                                                    @php
                                                                        $grade4=1;
                                                                    @endphp
                                                                    {{ $grade4 }}
                                                            @else
                                                                    @php
                                                                        $grade4=0;
                                                                    @endphp
                                                                    {{ $grade4 }}
                                                             @endif

                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if ($total5!=0)
                                                            @if($total5>=90)
                                                                @php
                                                                    $grade5=4;
                                                                @endphp
                                                                {{ $grade5 }}
                                                            @elseif($total5>=80 && $total5<90)
                                                                    @php
                                                                        $grade5=4;
                                                                    @endphp
                                                                    {{ $grade5 }}
                                                            @elseif($total5>=75 && $total5<90)
                                                                    @php
                                                                        $grade5=3.7;
                                                                    @endphp
                                                                    {{ $grade5 }}

                                                            @elseif($total5>=70 && $total5<75)
                                                                    @php
                                                                        $grade5=3.4;
                                                                    @endphp
                                                                    {{ $grade5 }}
                                                            @elseif($total5>=65 && $total5<70)
                                                                    @php
                                                                        $grade5=3.1;
                                                                    @endphp
                                                                    {{ $grade5 }}
                                                            @elseif($total5>=60 && $total5<65)
                                                                    @php
                                                                        $grade5=2.7;
                                                                    @endphp
                                                                    {{ $grade5 }}
                                                            @elseif($total5>=55 && $total5<60)
                                                                    @php
                                                                        $grade5=2.4;
                                                                    @endphp
                                                                    {{ $grade5 }}
                                                            @elseif($total5>=50 && $total5<55)
                                                                    @php
                                                                        $grade5=2.1;
                                                                    @endphp
                                                                    {{ $grade5 }}
                                                            @elseif($total5>=45 && $total5<50)
                                                                    @php
                                                                        $grade5=1.7;
                                                                    @endphp
                                                                    {{ $grade5 }}
                                                            @elseif($total5>=40 && $total5<45)
                                                                    @php
                                                                        $grade5=1.4;
                                                                    @endphp
                                                                    {{ $grade5 }}
                                                            @elseif($total5>=35 && $total5<40)
                                                                    @php
                                                                        $grade5=1;
                                                                    @endphp
                                                                    {{ $grade5 }}
                                                            @else
                                                                    @php
                                                                        $grade5=0;
                                                                    @endphp
                                                                    {{ $grade5 }}
                                                             @endif

                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if ($total6!=0)
                                                            @if($total6>=90)
                                                                @php
                                                                    $grade6=4;
                                                                @endphp
                                                                {{ $grade6 }}
                                                            @elseif($total6>=80 && $total6<90)
                                                                    @php
                                                                        $grade6=4;
                                                                    @endphp
                                                                    {{ $grade6 }}
                                                            @elseif($total6>=75 && $total6<90)
                                                                    @php
                                                                        $grade6=3.7;
                                                                    @endphp
                                                                    {{ $grade6 }}

                                                            @elseif($total6>=70 && $total6<75)
                                                                    @php
                                                                        $grade6=3.4;
                                                                    @endphp
                                                                    {{ $grade6 }}
                                                            @elseif($total6>=65 && $total6<70)
                                                                    @php
                                                                        $grade6=3.1;
                                                                    @endphp
                                                                    {{ $grade6 }}
                                                            @elseif($total6>=60 && $total6<65)
                                                                    @php
                                                                        $grade6=2.7;
                                                                    @endphp
                                                                    {{ $grade6 }}
                                                            @elseif($total6>=55 && $total6<60)
                                                                    @php
                                                                        $grade6=2.4;
                                                                    @endphp
                                                                    {{ $grade6 }}
                                                            @elseif($total6>=50 && $total6<55)
                                                                    @php
                                                                        $grade6=2.1;
                                                                    @endphp
                                                                    {{ $grade6 }}
                                                            @elseif($total6>=45 && $total6<50)
                                                                    @php
                                                                        $grade6=1.7;
                                                                    @endphp
                                                                    {{ $grade6 }}
                                                            @elseif($total6>=40 && $total6<45)
                                                                    @php
                                                                        $grade6=1.4;
                                                                    @endphp
                                                                    {{ $grade6 }}
                                                            @elseif($total6>=35 && $total6<40)
                                                                    @php
                                                                        $grade6=1;
                                                                    @endphp
                                                                    {{ $grade6 }}
                                                            @else
                                                                    @php
                                                                        $grade6=0;
                                                                    @endphp
                                                                    {{ $grade6 }}
                                                             @endif

                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if ($total7!=0)
                                                            @if($total7>=90)
                                                                @php
                                                                    $grade7=4;
                                                                @endphp
                                                                {{ $grade7 }}
                                                            @elseif($total7>=80 && $total7<90)
                                                                    @php
                                                                        $grade7=4;
                                                                    @endphp
                                                                    {{ $grade7 }}
                                                            @elseif($total7>=75 && $total7<90)
                                                                    @php
                                                                        $grade7=3.7;
                                                                    @endphp
                                                                    {{ $grade7 }}

                                                            @elseif($total7>=70 && $total7<75)
                                                                    @php
                                                                        $grade7=3.4;
                                                                    @endphp
                                                                    {{ $grade7 }}
                                                            @elseif($total7>=65 && $total7<70)
                                                                    @php
                                                                        $grade7=3.1;
                                                                    @endphp
                                                                    {{ $grade7 }}
                                                            @elseif($total7>=60 && $total7<65)
                                                                    @php
                                                                        $grade7=2.7;
                                                                    @endphp
                                                                    {{ $grade7 }}
                                                            @elseif($total7>=55 && $total7<60)
                                                                    @php
                                                                        $grade7=2.4;
                                                                    @endphp
                                                                    {{ $grade7 }}
                                                            @elseif($total7>=50 && $total7<55)
                                                                    @php
                                                                        $grade7=2.1;
                                                                    @endphp
                                                                    {{ $grade7 }}
                                                            @elseif($total7>=45 && $total7<50)
                                                                    @php
                                                                        $grade7=1.7;
                                                                    @endphp
                                                                    {{ $grade7 }}
                                                            @elseif($total7>=40 && $total7<45)
                                                                    @php
                                                                        $grade7=1.4;
                                                                    @endphp
                                                                    {{ $grade7 }}
                                                            @elseif($total7>=35 && $total7<40)
                                                                    @php
                                                                        $grade7=1;
                                                                    @endphp
                                                                    {{ $grade7 }}
                                                            @else
                                                                    @php
                                                                        $grade7=0;
                                                                    @endphp
                                                                    {{ $grade7 }}
                                                             @endif

                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if ($total8!=0)
                                                            @if($total8>=90)
                                                                @php
                                                                    $grade8=4;
                                                                @endphp
                                                                {{ $grade8 }}
                                                            @elseif($total8>=80 && $total8<90)
                                                                    @php
                                                                        $grade8=4;
                                                                    @endphp
                                                                    {{ $grade8 }}
                                                            @elseif($total8>=75 && $total8<90)
                                                                    @php
                                                                        $grade8=3.7;
                                                                    @endphp
                                                                    {{ $grade8 }}

                                                            @elseif($total8>=70 && $total8<75)
                                                                    @php
                                                                        $grade8=3.4;
                                                                    @endphp
                                                                    {{ $grade8 }}
                                                            @elseif($total8>=65 && $total8<70)
                                                                    @php
                                                                        $grade8=3.1;
                                                                    @endphp
                                                                    {{ $grade8 }}
                                                            @elseif($total8>=60 && $total8<65)
                                                                    @php
                                                                        $grade8=2.7;
                                                                    @endphp
                                                                    {{ $grade8 }}
                                                            @elseif($total8>=55 && $total8<60)
                                                                    @php
                                                                        $grade8=2.4;
                                                                    @endphp
                                                                    {{ $grade8 }}
                                                            @elseif($total8>=50 && $total8<55)
                                                                    @php
                                                                        $grade8=2.1;
                                                                    @endphp
                                                                    {{ $grade8 }}
                                                            @elseif($total8>=45 && $total8<50)
                                                                    @php
                                                                        $grade8=1.7;
                                                                    @endphp
                                                                    {{ $grade8 }}
                                                            @elseif($total8>=40 && $total8<45)
                                                                    @php
                                                                        $grade8=1.4;
                                                                    @endphp
                                                                    {{ $grade8 }}
                                                            @elseif($total8>=35 && $total8<40)
                                                                    @php
                                                                        $grade8=1;
                                                                    @endphp
                                                                    {{ $grade8 }}
                                                            @else
                                                                    @php
                                                                        $grade8=0;
                                                                    @endphp
                                                                    {{ $grade8 }}
                                                             @endif

                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if ($total9!=0)
                                                            @if($total9>=90)
                                                                @php
                                                                    $grade9=4;
                                                                @endphp
                                                                {{ $grade9 }}
                                                            @elseif($total9>=80 && $total9<90)
                                                                    @php
                                                                        $grade9=4;
                                                                    @endphp
                                                                    {{ $grade9 }}
                                                            @elseif($total9>=75 && $total9<90)
                                                                    @php
                                                                        $grade9=3.7;
                                                                    @endphp
                                                                    {{ $grade9 }}

                                                            @elseif($total9>=70 && $total9<75)
                                                                    @php
                                                                        $grade9=3.4;
                                                                    @endphp
                                                                    {{ $grade9 }}
                                                            @elseif($total9>=65 && $total9<70)
                                                                    @php
                                                                        $grade9=3.1;
                                                                    @endphp
                                                                    {{ $grade9 }}
                                                            @elseif($total9>=60 && $total9<65)
                                                                    @php
                                                                        $grade9=2.7;
                                                                    @endphp
                                                                    {{ $grade9 }}
                                                            @elseif($total9>=55 && $total9<60)
                                                                    @php
                                                                        $grade9=2.4;
                                                                    @endphp
                                                                    {{ $grade9 }}
                                                            @elseif($total9>=50 && $total9<55)
                                                                    @php
                                                                        $grade9=2.1;
                                                                    @endphp
                                                                    {{ $grade9 }}
                                                            @elseif($total9>=45 && $total9<50)
                                                                    @php
                                                                        $grade9=1.7;
                                                                    @endphp
                                                                    {{ $grade9 }}
                                                            @elseif($total9>=40 && $total9<45)
                                                                    @php
                                                                        $grade9=1.4;
                                                                    @endphp
                                                                    {{ $grade9 }}
                                                            @elseif($total9>=35 && $total9<40)
                                                                    @php
                                                                        $grade9=1;
                                                                    @endphp
                                                                    {{ $grade9 }}
                                                            @else
                                                                    @php
                                                                        $grade9=0;
                                                                    @endphp
                                                                    {{ $grade9 }}
                                                             @endif

                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if ($total10!=0)
                                                            @if($total10>=90)
                                                                @php
                                                                    $grade10=4;
                                                                @endphp
                                                                {{ $grade10 }}
                                                            @elseif($total10>=80 && $total10<90)
                                                                    @php
                                                                        $grade10=4;
                                                                    @endphp
                                                                    {{ $grade10 }}
                                                            @elseif($total10>=75 && $total10<90)
                                                                    @php
                                                                        $grade10=3.7;
                                                                    @endphp
                                                                    {{ $grade10 }}

                                                            @elseif($total10>=70 && $total10<75)
                                                                    @php
                                                                        $grade10=3.4;
                                                                    @endphp
                                                                    {{ $grade10 }}
                                                            @elseif($total10>=65 && $total10<70)
                                                                    @php
                                                                        $grade10=3.1;
                                                                    @endphp
                                                                    {{ $grade10 }}
                                                            @elseif($total10>=60 && $total10<65)
                                                                    @php
                                                                        $grade10=2.7;
                                                                    @endphp
                                                                    {{ $grade10 }}
                                                            @elseif($total10>=55 && $total10<60)
                                                                    @php
                                                                        $grade10=2.4;
                                                                    @endphp
                                                                    {{ $grade10 }}
                                                            @elseif($total10>=50 && $total10<55)
                                                                    @php
                                                                        $grade10=2.1;
                                                                    @endphp
                                                                    {{ $grade10 }}
                                                            @elseif($total10>=45 && $total10<50)
                                                                    @php
                                                                        $grade10=1.7;
                                                                    @endphp
                                                                    {{ $grade10 }}
                                                            @elseif($total10>=40 && $total10<45)
                                                                    @php
                                                                        $grade10=1.4;
                                                                    @endphp
                                                                    {{ $grade10 }}
                                                            @elseif($total10>=35 && $total10<40)
                                                                    @php
                                                                        $grade10=1;
                                                                    @endphp
                                                                    {{ $grade10 }}
                                                            @else
                                                                    @php
                                                                        $grade10=0;
                                                                    @endphp
                                                                    {{ $grade10 }}
                                                             @endif

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
                                        </div> --}}




                                    </div>
                                </div>
{{--                                <canvas id="marksChart2" width="600" height="400"></canvas>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <canvas id="marksChart" width="600" height="400"></canvas>
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
    var marksCanvas2 = document.getElementById("marksChart2");
    var avg1 = "<?php echo $avg1; ?>";
    var avg2 = "<?php echo $avg2; ?>";
    var avg3 = "<?php echo $avg3; ?>";
    var avg4 = "<?php echo $avg4; ?>";
    var avg5 = "<?php echo $avg5; ?>";
    var avg6 = "<?php echo $avg6; ?>";
    var avg7 = "<?php echo $avg7; ?>";
    var avg7 = "<?php echo $avg7; ?>";
    var avg8 = "<?php echo $avg8; ?>";
    var avg9 = "<?php echo $avg9; ?>";
    var avg10 = "<?php echo $avg10; ?>";

    var total1 = "<?php echo $total1; ?>";
    var total2 = "<?php echo $total2; ?>";
    var total3 = "<?php echo $total3; ?>";
    var total4 = "<?php echo $total4; ?>";
    var total5 = "<?php echo $total5; ?>";
    var total6 = "<?php echo $total6; ?>";
    var total7 = "<?php echo $total7; ?>";
    var total7 = "<?php echo $total7; ?>";
    var total8 = "<?php echo $total8; ?>";
    var total9 = "<?php echo $total9; ?>";
    var total10 = "<?php echo $total10; ?>";

    var marksData = {
    labels: ["PLO1", "PLO2", "PLO3", "PLO4", "PLO5", "PLO6","PLO7","PLO8","PLO9","PLO10"],
    datasets: [{
        label: "GPA",
        backgroundColor: "rgba(200,0,0,0.2)",
        data: [avg1, avg2, avg3, avg4, avg5, avg6,avg7,avg8,avg9,avg10]
    }, {
        label: "CGPA",
        backgroundColor: "rgba(0,0,200,0.2)",
        data: [total1, total2, total3, total4, total5, total6,total7,total8,total9,total10]
    }]
    };

var radarChart = new Chart(marksCanvas, {
  type: 'radar',
  data: marksData
});
var radarChart2 = new Chart(marksCanvas2, {
  type: 'radar',
  data: marksData
});
</script>

@endsection
