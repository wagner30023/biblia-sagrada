<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = ['posicao', 'nome', 'abreviacao', 'testamento_id','versao_id'];

    /*
        * pegar o testamento
    */

    public function testamentos()
    {
        return $this->belongsTo(Testamento::class);
    }

    /*
        * pegar todos os versiculos vinculados
    */

    public function versiculos()
    {
        return $this->hasMany(Versiculo::class);
    }


    /*
        * pega a versao
    */

    public function versao()
    {
        return $this->belongsTo(Versao::class);
    }
}
