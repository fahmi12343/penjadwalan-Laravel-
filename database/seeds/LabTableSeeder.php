<?php

use Illuminate\Database\Seeder;

class LabTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lab  =[
            [
                'nama_lab'=>'Lab 01',
                'desk_lab'=>'Android,Cisco',
            ],
            [
                'nama_lab'=>'Lab 02',
                'desk_lab'=>'Cisco,Dev C',
            ],
            [
                'nama_lab'=>'Lab 04',
                'desk_lab'=>'Sql,Revit',
            ],
        ];
        DB::table('lab')->insert($lab);
    }
}
