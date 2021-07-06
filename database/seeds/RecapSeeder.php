<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recaps')->insert([
            'employee_id' => 1,
            'month' => 7,
            'presence' => 21,
            'overtime' => 2,
            'allowance_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('recaps')->insert([
            'employee_id' => 2,
            'month' => 7,
            'presence' => 20,
            'overtime' => 3,
            'allowance_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('recaps')->insert([
            'employee_id' => 3,
            'month' => 7,
            'presence' => 22,
            'overtime' => 2,
            'allowance_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('recaps')->insert([
            'employee_id' => 4,
            'month' => 7,
            'presence' => 22,
            'overtime' => 5,
            'allowance_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
