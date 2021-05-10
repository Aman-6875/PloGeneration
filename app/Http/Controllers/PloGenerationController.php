<?php

namespace App\Http\Controllers;

use App\Clo;
use App\CloGeneration;
use App\CloPloEngagement;
use App\Courses;
use App\MarkingDistribution;
use App\MarkingParameter;
use App\MarksWithCloPlo;
use App\Plo;
use App\PloGeneration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PloGenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Courses::all();
        return view('plo_generation.create')
            ->with('courses',$courses);
    }
    public function createCloGeneration(Request $request)
    {
        $parameters = MarkingParameter::all();
        $clos = Clo::all();
        $plos = Plo::all();
        return view('plo_generation.createClo')
        ->with('course_id',$request->course_id)
        ->with('clos',$clos)
        ->with('plos',$plos)
        ->with('parameters',$parameters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $payloads = $this->markDistributionSanitizer($request->all());
        DB::beginTransaction();
        try {
            foreach ($payloads as $payload)
            {
                $plo_clo_engagement = CloPloEngagement::create([
                    'course_id' => $payload['course_id'],
                    'clo_id' => $payload['clo_id'],
                    'plo_id' => $payload['plo_id']
                ]);
                for($i = 0; $i < 9; $i++){
                    if ($payload['marking_parameter'][$i] != null){
                        MarkingDistribution::create([
                            'clo_plo_engagement_id' => $plo_clo_engagement->id,
                            'course_id' => $payload['course_id'],
                            'marking_parameter_id' => $payload['marking_parameter'][$i],
                            'parcentage' => $payload['input_number'][$i] == null ? 0 : $payload['input_number'][$i]
                        ]);
                    }
                }
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            dd($exception);
        }
        return view('clo_generation.create')
        ->with('success','Successfully Data inserted')
        ->with('datas',$payloads);
    }

    public function markDistributionSanitizer($request)
    {
        $payload_container = [];
        unset($request['col_one_input'][count($request['col_one_input'])-1]);
        unset($request['col_two_input'][count($request['col_two_input'])-1]);
        unset($request['col_three_input'][count($request['col_three_input'])-1]);
        unset($request['weightage'][count($request['weightage'])-1]);
        for ($j = 0; $j < 9 ; $j++){
            if ($request['col_one_plo'] != null){
                $payload_container[] = [
                    'course_id' => $request['course_id'],
                    'clo_id' => 1,
                    'plo_id' => $request['col_one_plo'],
                    'marking_parameter' => $request['marking_parameters'],
                    'input_number' => $request['col_one_input'],
                ];
            }
            if ($request['col_two_plo'] != null){
                $payload_container[] = [
                    'course_id' => $request['course_id'],
                    'clo_id' => 2,
                    'plo_id' => $request['col_two_plo'],
                    'marking_parameter' => $request['marking_parameters'],
                    'input_number' => $request['col_two_input'],
                ];
            }
            if ($request['col_three_plo'] != null){
                $payload_container[] = [
                    'course_id' => $request['course_id'],
                    'clo_id' => 3,
                    'plo_id' => $request['col_three_plo'],
                    'marking_parameter' => $request['marking_parameters'],
                    'input_number' => $request['col_three_input'],
                ];
            }
            return $payload_container;
        }

    }


    public function storeOld(Request $request)
    {
       //return $request->all();
        unset($request['_token']);
        $i = 0;
        $j = 0;
        $total = 0;
        $total2 = 0;
        $total3 = 0;


        //return $request['col_one_plo'];
        foreach($request['col_one_input'] as $data){
         if($data!= null){
            $datas=[
                'plo' => $request->plo[$i],
                'col_one_input' => $data,
                'col_two_input' => $request->col_two_input[$i],
                'col_three_input' => $request->col_two_input[$i],
            ];
            if($request->plo[$i]!='Final Exam'){
                $total = $total+ $data;
                $total2 = $total2+ $request->col_two_input[$i];
                $total3 = $total2+ $request->col_three_input[$i];
                $j++;
            }
            $i++;
         }


        }
        $total_col_1 = $total/$j;
        $total_col_2 = $total2/$j;
        $total_col_3 = $total3/$j;
        $request['plo'] = json_encode($request['plo']);
        $request['col_one_input'] = json_encode($request['col_one_input']);
        $request['col_two_input'] = json_encode($request['col_two_input']);
        $request['col_three_input'] = json_encode($request['col_three_input']);
        $request['weightage'] = json_encode($request['weightage']);
        $request['total_col_one'] = $total_col_1;
        $request['total_col_two'] = $total_col_2;
        $request['total_col_three'] = $total_col_3;
        // $request->all();
        // $total_col_1 = $total/$i;
        // $total_col_2 = $total2/$i;
        // $total_col_3 = $total3/$i;
        $clo_table_id = CloGeneration::insertGetId($request->all());
     //   return $clo_table_id;
         $ploWithAverage = [
             'col_one_plo' => $request->col_one_plo,
             'col_two_plo' => $request->col_two_plo,
             'col_three_plo' => $request->col_three_plo,
             'col_one_plo_avg' => $total_col_1,
             'col_two_plo_avg' => $total_col_2,
             'col_three_plo_avg' => $total_col_3,
             'student_id'=>$request->student_id,
             'course_code'=>$request->course_code,
             'course_title'=>$request->course_title,
             'semester'=>$request->semester,
             'clo_generation_table_id'=>$clo_table_id,
         ];
         PloGeneration::create($ploWithAverage);
         return redirect()->to('/create-plo-generation')->with('success','Successfully Data inserted');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\PloGeneration  $ploGeneration
     * @return \Illuminate\Http\Response
     */
    public function show(PloGeneration $ploGeneration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PloGeneration  $ploGeneration
     * @return \Illuminate\Http\Response
     */
    public function edit(PloGeneration $ploGeneration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PloGeneration  $ploGeneration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PloGeneration $ploGeneration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PloGeneration  $ploGeneration
     * @return \Illuminate\Http\Response
     */
    public function destroy(PloGeneration $ploGeneration)
    {
        //
    }
    public function ploTableSearch()
    {
        $user = Auth::user();
        if(Auth::user()->user_role=='Student'){
            $courses = $user->courses;
        }else{
            $courses =Courses::all();
        }

        return view('plo_generation.plo_table_search')
            ->with('courses',$courses);
    }
    public function ploTableDataGet(Request $request)
    {
       // return $request->all();

        $i=0;
        $j=0;
        $k=0;
        $l=0;
        $m=0;
        $n=0;
        $o=0;
        $p=0;
        $q=0;
        $r=0;
        $total1=0;
        $total2=0;
        $total3=0;
        $total4=0;
        $total5=0;
        $total6=0;
        $total7=0;
        $total8=0;
        $total9=0;
        $total10=0;
        $id = Auth::user()->user_id;
        if(Auth::user()->user_role=='Student'){
        $ploData = MarksWithCloPlo::where('course_id',$request->course_code)->where('student_id',$id)->join('plos','marks_with_clo_plos.plo_id','=','plos.id')->select('marks_with_clo_plos.*','plos.name')->get();

        }else{
      return  $ploData = MarksWithCloPlo::where('course_id',$request->course_code)->join('plos','marks_with_clo_plos.plo_id','=','plos.id')->join('users','marks_with_clo_plos.student_id','=','users.user_id')->select('marks_with_clo_plos.*','plos.name','users.first_name')->get();

        }
        //return $request->course_code;
        foreach($ploData as $data){
            if($data->plo_id!=null){
                if($data->plo_id==1){
                    $total1 = $total1 +$data->mark;
                    $i++;
                }
                elseif($data->plo_id==2){
                    $total2 = $total2 + $data->mark;
                    $j++;
                }
                elseif($data->plo_id==3){
                    $total3 = $total3 +$data->mark;
                    $k++;
                }
                elseif($data->plo_id==4){
                    $total4 = $total4 +$data->mark;
                    $l++;
                }
                elseif($data->plo_id==5){
                    $total5 = $total5 + $data->mark;
                    $m++;
                }
                elseif($data->plo_id==6){
                    $total6 = $total6 + $data->mark;
                    $n++;
                }
                elseif($data->plo_id==7){
                    $total7 = $total7 + $data->mark;
                    $o++;
                }
                elseif($data->plo_id==8){
                    $total8 = $total8 +$data->mark;
                    $p++;
                }
                elseif($data->plo_id==9){
                    $total9 = $total9 +$data->mark;
                    $q++;
                }
                elseif($data->plo_id==10){
                    $total10 = $total10 + $data->mark;
                    $r++;
                }

            }

        }
        if($total1!=0){
            $avg1 = $total1/$i;
        }else{
            $avg1 = 0;
        }
        if($total2!=0){
            $avg2 = $total1/$j;
        }else{
            $avg2 = 0;
        }
        if($total3!=0){
            $avg3 = $total3/$k;
        }else{
            $avg3 = 0;
        }
        if($total4!=0){
            $avg4 = $total4/$l;
        }else{
            $avg4 = 0;
        }
        if($total5!=0){
            $avg5 = $total5/$m;
        }else{
            $avg5 = 0;
        }
        if($total6!=0){
            $avg6 = $total6/$n;
        }else{
            $avg6 = 0;
        }
        if($total7!=0){
            $avg7 = $total7/$o;
        }else{
            $avg7 = 0;
        }
        if($total8!=0){
            $avg8 = $total8/$p;
        }else{
            $avg8 = 0;
        }
        if($total9!=0){
            $avg9 = $total9/$q;
        }else{
            $avg9 = 0;
        }
        if($total10!=0){
            $avg10 = $total10/$r;
        }else{
            $avg10 = 0;
        }






    //   return  $data = PloGeneration::where('course_code',$request->course_code)->get();
        //  $total3;
        if(Auth::user()->user_role=='Student'){
            return view('plo_generation.plo_table')

            ->with('ploData',$ploData)
            ->with('avg1',$avg1)
            ->with('avg2',$avg2)
            ->with('avg3',$avg3)
            ->with('avg4',$avg4)
            ->with('avg5',$avg5)
            ->with('avg6',$avg6)
            ->with('avg7',$avg7)
            ->with('avg8',$avg8)
            ->with('avg9',$avg9)
            ->with('avg10',$avg10)
            ->with('total1',$total1)
            ->with('total2',$total2)
            ->with('total3',$total3)
            ->with('total4',$total4)
            ->with('total5',$total5)
            ->with('total6',$total6)
            ->with('total7',$total7)
            ->with('total8',$total8)
            ->with('total9',$total9)
            ->with('total10',$total10)

            ->with('course_code',$request->course_code);

        }else{

            return view('plo_generation.plo_table_all_data')
            ->with('course_code',$request->course_code)
            ->with('ploData',$ploData);
        }

    }
    public function Clocreate($data)
    {
        // dd($data);
        // $data = PloGeneration::where('course_code',$request->course_code)->get();

        return view('clo_generation.create');

    }
    public function CloSave(Request $request)
    {
        return $request->all();
        $i=0;

        $datas  = [];
        //$data = PloGeneration::where('course_code',$request->course_code)->get();
        foreach($request['clo_id'] as $data){
            if( $request->marking_parameter[$i] == "10")    {
                dd($request->marking_parameter[10]);
            }
            $datas =[
                'mark' => $request->marks[$i],
                'clo_id' => $request->clo_id[$i],
                'plo_id' => $request->plo_id[$i],
                'course_id' => $request->course_id,
                'marking_parameter' => $request->marking_parameter[$i],
                'student_id' => $request->student_id[$i],

            ];
            // MarksWithCloPlo::create($datas);
            $i++;

        }


        return redirect()->to('/')->with('success','Data succesfully Added');

    }




}
