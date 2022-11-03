<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'deneme',
            'todo list örnek uygulaması yapılacak',
            'Aktif',
            1
        ];
        
            DB::table('todos')->insert([
                'title' => $data[0],
                'content' => $data[1],
                'status' => $data[2],
                'user_id' => $data[3]
           ]);
    }
}
