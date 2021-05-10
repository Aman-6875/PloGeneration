<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'title' => 'Software Security',
            'course_code' =>'EC-3117',
        ]);
        DB::table('courses')->insert([
            'title' => 'Data-base',
            'course_code' =>'EC-3257',
        ]);
    }
}
