<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public function lista()
    {
        return (object) [
            'Nome' => 'Tiago',
            'Telefone' => '123456789'
        ];
    }
}
