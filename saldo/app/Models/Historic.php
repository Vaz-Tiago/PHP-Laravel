<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Historic extends Model
{
    //Definindo fillable - Colunas que podem ser editadas da tabela.
    protected $fillable = ['type', 'amount', 'total_before', 'total_after', 'user_id_transaction', 'date'];

    //Criando um mutator, para sempre formatar a data quando eu recebo o valor do banco de dados
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function type( $type = null)
    {
        $types = [
            'I' => 'Depósito',
            'O' => 'Saque',
            'T' => 'Transferência',
        ];

        if (!$type) 
        {
            return $types;
        }

        if($this->user_id_transaction != null && $type == 'I')
        {
            return 'Recebido';
        }
        
        return $types[$type];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userSender()
    {
        return $this->belongsTo(User::class, 'user_id_transaction');
    }


    public function scopeUserAuth($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }

    public function search(Array $data, $totalPage)
    {
        //Aplicando o filtro.
        //dentro do qehre é chamado uma função anonima que recebe a query
        //Para utilizar a variavel que foi passada como parametro dentro do where, é necessário dar um use()
        //O array $data recebe os valores dos campos do formulário
        return  $this->where(function ($query) use($data){
            //Como o campo pode ou não estar preenchido é necessário uma verificação p/ aplicar o filtro
            if(isset($data['id']))
                //O igual pode ou não ser passado, se não tiver nenhuma condicional o laravel entende que é igual
                $query->where('id', '=', $data['id']); 
            //E assim segue filtrando os campos do formulário
            if(isset($data['date']))
                $query->where('date', $data['date']);
            
            if(isset($data['type']))
                $query->where('type', $data['type']);

        })//->toSql(); //Armazenar em uma variável para debugar a query
        //->where('user_id', auth()->user()->id) //Traz o histórico apenas do usuário logado
        ->userAuth()
        ->paginate($totalPage);
    }
}