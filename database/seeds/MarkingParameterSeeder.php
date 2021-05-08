<?php

use Illuminate\Database\Seeder;

class MarkingParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            'Assignment 1',
            'Assignment 2',
            'Quiz 1',
            'Quiz 2',
            'Final Exam'
        ];
       foreach ($params as $param){
           \App\MarkingParameter::create([
               'name' => $param
           ]);
       }
    }
}
