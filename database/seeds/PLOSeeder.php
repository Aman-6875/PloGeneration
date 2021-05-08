<?php

use Illuminate\Database\Seeder;

class PLOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 3; $i++){
            \App\Plo::create([
                'name' => 'PLO'.$i
            ]);
        }
    }
}
