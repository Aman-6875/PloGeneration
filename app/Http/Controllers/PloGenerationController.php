<?php

namespace App\Http\Controllers;

use App\Clo;
use App\CloGeneration;
use App\CloPloEngagement;
use App\MarkingDistribution;
use App\MarkingParameter;
use App\Plo;
use App\PloGeneration;
use Illuminate\Http\Request;
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
        return view('plo_generation.create');
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
        return redirect()->to('/create-plo-generation')->with('success','Successfully Data inserted');
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
        return view('plo_generation.plo_table_search');
    }
    public function ploTableDataGet(Request $request)
    {
        //return $request->course_code;
        $data = PloGeneration::where('course_code',$request->course_code)->get();

        return view('plo_generation.plo_table')
        ->with('datas',$data)
        ->with('course_code',$request->course_code);

    }
}
