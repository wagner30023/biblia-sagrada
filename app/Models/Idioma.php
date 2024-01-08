<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Idioma extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    /*
        * Pega a versão
    */
    public function versoes()
    {
        return $this->hasMany(Versao::class);
    }
}
