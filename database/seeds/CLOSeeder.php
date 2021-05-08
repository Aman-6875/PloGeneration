<?php

use Illuminate\Database\Seeder;

class CLOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 3; $i++){
            \App\Clo::create([
                'name' => 'CLO'.$i
            ]);
        }
    }
}
