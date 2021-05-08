<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CLOSeeder::class);
        $this->call(PLOSeeder::class);
        $this->call(MarkingParameterSeeder::class);
        $this->call(UserSeeder::class);
    }
}
