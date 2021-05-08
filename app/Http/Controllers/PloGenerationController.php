<?php

namespace App\Http\Controllers;

use App\CloGeneration;
use App\PloGeneration;
use Illuminate\Http\Request;

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

        return view('plo_generation.createClo')
        ->with('course_code',$request->course_code)
        ->with('student_id',$request->student_id)
        ->with('semester',$request->semester)
        ->with('course_title',$request->course_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
