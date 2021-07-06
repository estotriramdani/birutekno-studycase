<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'id' => 1,
            'name' => 'Karyawan A',
            'salary' => 10000000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('employees')->insert([
            'id' => 2,
            'name' => 'Karyawan B',
            'salary' => 5600000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('employees')->insert([
            'id' => 3,
            'name' => 'Karyawan C',
            'salary' => 7000000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('employees')->insert([
            'id' => 4,
            'name' => 'Karyawan D',
            'salary' => 8000000,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
