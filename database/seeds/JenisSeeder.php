<?php

use App\Jenis;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $jenis = [
            [
                "no_jenis"=>"01",
                "nama_jenis"=>"Geologika"
            ],
            [
                "no_jenis"=>"02",
                "nama_jenis"=>"Biologika"
            ],
            [
                "no_jenis"=>"03",
                "nama_jenis"=>"Etnografika"
            ],
            [
                "no_jenis"=>"04",
                "nama_jenis"=>"Arkeologika"
            ],
            [
                "no_jenis"=>"05",
                "nama_jenis"=>"Historika"
            ],
            [
                "no_jenis"=>"06",
                "nama_jenis"=>"Numismatika & Heraldika"
            ],
            [
                "no_jenis"=>"07",
                "nama_jenis"=>"Filologika"
            ],
            [
                "no_jenis"=>"08",
                "nama_jenis"=>"Keramologika"
            ],
            [
                "no_jenis"=>"09",
                "nama_jenis"=>"Seni Rupa"
            ],
            [
                "no_jenis"=>"10",
                "nama_jenis"=>"Teknologika"
            ],

        ];
        Jenis::insert($jenis);
    }
}
