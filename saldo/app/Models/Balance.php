<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
    public $timestamps = false;
    
    public function deposit(float $value) : Array
    {
        //iniciando uma transaction
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value, 2, '.', '');
        //Colocar a ação de salvar em uma variavel para fazer a verificação de sucesso
        $deposit = $this->save();

        //Criando o histórico: 
        //As informações que serão inseridas serão passadas via array.
        //Para que isso funcione é necessário ir até a model e definir o que pode ser alterado.
        //fillable -
        //Isso é uma segurança do laravel para evitar que seja feita uma inserção inválida.
        $historic = auth()->user()->historics()->create([
            'type'          => 'I',
            'amount'        => $value,
            'total_before'  => $totalBefore,
            'total_after'   => $this->amount,
            'date'          => date('Ymd'),
        ]);

        if($deposit && $historic)
        {
            DB::commit();
            
            return [
                'success' => true,
                'message' => 'Deposito efetuado com sucesso'
            ];
        }
        else
        {
            DB::rollback();

            return [
                'success' => false,
                'message' => 'Erro no deposito'
            ];
        }
    }

    
    
    public function withdraw(float $value) : Array
    {
        if ($this->amount < $value)
            return [
                'success' => false,
                'message' => 'Saldo insuficiente',
            ];
        
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;

        $this->amount -= number_format($value, '2', '.', '');

        $withdraw = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'          => 'O',
            'amount'        => $value,
            'total_before'  => $totalBefore,
            'total_after'   => $this->amount,
            'date'          => date('Ymd')
        ]);

        if($withdraw && $historic)
        {
            DB::commit();
            return [
                'success' => true,
                'message' => 'withdraw realizado com sucesso!'
            ];
        }
        else
        {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Erro ao realizar o withdraw'
            ];
        }
    }
}