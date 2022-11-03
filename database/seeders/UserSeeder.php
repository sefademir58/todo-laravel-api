<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'test1' => '12345',
            'test2' => 'qwerty'
        ];
        foreach ($data as $key => $value) {
            DB::table('users')->insert([
                'username' => $key,
                'password' => md5($value)
           ]);
        }
       
    }
}
