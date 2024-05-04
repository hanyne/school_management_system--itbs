<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'cycle prepa', 'code' => 'CP'],
            ['name' => 'cycle ingenieur', 'code' => 'CI'],
            ['name' => 'bussiness intellegence', 'code' => 'BI'],
            ['name' => 'genie logiciel', 'code' => 'GN'],
            ['name' => 'comptabilite', 'code' => 'C'],
            ['name' => 'marketing', 'code' => 'M'],
        ];

        DB::table('class_types')->insert($data);

    }
}
