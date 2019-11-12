<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;
    
    public function deposit(float $value) : Array
    {
       $this->amount += number_format($value, 2, '.', '');
       //Colocar a ação de salvar em uma variavel para fazer a verificação de sucesso
       $deposit = $this->save();

       if($deposit)
       {
           return [
               'success' => true,
               'message' => 'Deposito efetuado com sucesso'
           ];
       }
       else
       {
           return [
               'success' => false,
               'message' => 'Erro no deposito'
           ];
       }
    }   
}