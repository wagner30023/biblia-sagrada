<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Testamento;

class TestamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testamento::create(['nome' => 'velho testamento']);
        Testamento::create(['nome' => 'novo testamento']);
    }
}
