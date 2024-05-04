<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_classes')->delete();
        $ct = ClassType::pluck('id')->all();

        $data = [
            ['name' => 'BI 1', 'class_type_id' => $ct[2]],
            ['name' => 'BI 2', 'class_type_id' => $ct[2]],
            ['name' => 'BI 3', 'class_type_id' => $ct[2]],
            ['name' => 'GN 1', 'class_type_id' => $ct[3]],
            ['name' => 'GN 2', 'class_type_id' => $ct[3]],
            ['name' => 'C 2', 'class_type_id' => $ct[4]],
            ['name' => 'C 3', 'class_type_id' => $ct[4]],
            ['name' => 'M 1', 'class_type_id' => $ct[5]],
            ['name' => 'M 2', 'class_type_id' => $ct[5]],
            ['name' => 'M 3', 'class_type_id' => $ct[5]],
            ];

        DB::table('my_classes')->insert($data);

    }
}
