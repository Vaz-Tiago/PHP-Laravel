<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
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
                'message' => 'Saque realizado com sucesso!'
            ];
        }
        else
        {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Erro ao realizar o Saque'
            ];
        }
    }

    public function transfer(float $value, User $sender) : Array
    {
        if ($this->amount < $value)
        {
            return [
                'success' => false,
                'message' => 'Saldo Insufuciente'
            ];
        }

        DB::beginTransaction();


        /**************************************************************
         * ATUALIZA O PRÓPRIO SALDO
        **************************************************************/

        $totalBefore = $this->amount ? $this->amount : 0;

        $this->amount -= number_format($value, '2', '.', '');

        $transfer = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'                  => 'T',
            'amount'                => $value,
            'total_before'          => $totalBefore,
            'total_after'           => $this->amount,
            'date'                  => date('Ymd'),
            'user_id_transaction'   => $sender->id,
        ]);


        /**************************************************************
         * ATUALIZA O SALDO DO RECEBEDOR
        **************************************************************/

        //Importante utilizar o metodo balance e o firtOrCreate, porque o valor inicial é null.
        //Talvez se no contrutor da tabela, fosse passado um valor default para o campo de 0, não haveria
        //essa dificuldade, pois toda nova conta aberta, ao inves de null receberia 0;
        $senderBalance = $sender->balance()->firstOrCreate([]);


        $totalBeforeSender = $senderBalance->amount ? $senderBalance->amount : 0;

        $senderBalance->amount += number_format($value, '2', '.', '');

        $transferSender = $senderBalance->save();

        $historicSender = $sender->historics()->create([
            'type'                  => 'I',
            'amount'                => $value,
            'total_before'          => $totalBeforeSender,
            'total_after'           => $senderBalance->amount,
            'date'                  => date('Ymd'),
            'user_id_transaction'   => auth()->user()->id,
        ]);

        if($transfer && $historic && $transferSender && $historicSender)
        {
            DB::commit();
            return [
                'success' => true,
                'message' => 'Transferência realizada com sucesso!'
            ];
        }
        else
        {
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Erro ao realizar a transferência'
            ];
        }
    }
}