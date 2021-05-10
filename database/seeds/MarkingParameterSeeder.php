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
            'Assignment 1', 'Assignment 2',
            'Assignment 3',  'Quiz 1', 'Quiz 2', 'Quiz 3', 'Quiz 4', 'Lab Test', 'Class Test', 'Final Exam', 'Project Report', 'Report', 'Presentation', 'Demo', 'Others'
        ];
       foreach ($params as $param){
           \App\MarkingParameter::create([
               'name' => $param
           ]);
       }
    }
}
