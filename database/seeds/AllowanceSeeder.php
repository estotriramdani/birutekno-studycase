<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllowanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('allowances')->insert([
            'id' => 1,
            'name' => 'BPJS TK',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('allowances')->insert([
            'id' => 2,
            'name' => 'BPJS TK + Kesehatan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
