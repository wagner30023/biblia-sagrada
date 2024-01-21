<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Versiculo;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function ler_a_biblia($versao)
    {
        $versiculo = Versiculo::whereHas('livro',function($query) use($versao){
            $query->whereHas('versao',function($query) use($versao){
                $query->where('abreviacao',$versao);
            });
        })->get();

        return response($versiculo,200);
    }
}
