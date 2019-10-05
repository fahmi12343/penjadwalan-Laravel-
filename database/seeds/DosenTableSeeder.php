<?php

use Illuminate\Database\Seeder;

class DosenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dosen  =[
            [
                'nip'=>'19002',
                'nama'=>'Iren Ada',
                'telp'=>'02191075624',
                'email'=>'irenada@gmail.com',
            ],
            [
                'nip'=>'18590',
                'nama'=>'Sanding riyantod',
                'telp'=>'02191857893',
                'email'=>'riyantod@gmail.com',
            ],
            [
                'nip'=>'17878',
                'nama'=>'Ferdy Ansyah',
                'telp'=>'02198765673',
                'email'=>'ansyahhh@gmail.com'
            ],
        ];
        DB::table('dosen')->insert($dosen);
    }
}
