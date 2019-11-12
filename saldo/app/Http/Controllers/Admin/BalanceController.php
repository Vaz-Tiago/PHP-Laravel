<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function depositStore(Request $request)
    {
        //Coletando informações do usuário que está fazendo o deposito: 
        //Foi recolhido a informação do usuário logado, e pego o saldo dele.
        //Caso seja o primeiro acesso, o firstOrDefault, cria um registro no banco de dados, caso a tabela
        //cumpra com o requisito de ter os campos default setados, para não ser lançado nenhum erro.
        $balance = auth()->user()->balance()->firstOrCreate([]);
        
        dd($balance->deposit($request->value));
    }
}
