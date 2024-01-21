<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Livro;


class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Livro::create([
        //     'posicao' => '1',
        //     'nome' => 'Apocalipse',
        //     'abreviacao' => 'ap',
        //     'testamento_id' => 1,
        //     'capa' => ''
        // ]);

        $data = [
            [
                'posicao' => 3,
                'nome' => 'Levítico',
                'abreviacao' => 'lv',
                'testamento_id' => 1,
                'versao_id' => 1,
                'capa' => ''
            ],
            [
                'posicao' => 4,
                'nome' => 'Números',
                'abreviacao' => 'nm',
                'testamento_id' => 1,
                'versao_id' => 1,
                'capa' => ''
            ],
            [
                'posicao' => 5,
                'nome' => 'Deuteronômio',
                'abreviacao' => 'dt',
                'testamento_id' => 1,
                'versao_id' => 1,
                'capa' => ''
            ],
            [
                'posicao' => 6,
                'nome' => 'Josué',
                'abreviacao' => 'js',
                'testamento_id' => 1,
                'versao_id' => 1,
                'capa' => ''
            ]
        ];

        Livro::insert($data);
    }
}
