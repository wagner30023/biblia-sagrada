<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Versao;


class VersaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Versao::create(['nome' => 'Italo Fonseca','abreviacao' => 'NVI', 'idioma_id' => 1]);
    }
}
