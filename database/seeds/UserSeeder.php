<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'user_id' =>'admin',
            'password' => Hash::make('123456'),
            'is_admin'=>1,
            'user_role'=>'admin',
            'user_type'=>1,
        ]);
    }
}
