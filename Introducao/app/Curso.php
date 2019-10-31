<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //Definindo fillable 
    //Define que é obrigatório.
    protected $fillable = [
        'titulo', 'descricao', 'valor', 'imagem', 'publicado'
    ];
}
