<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;

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

    public function withdraw()
    {
        return view('admin.balance.withdraw');
    }

    //deposito
    public function depositStore(MoneyValidationFormRequest $request)
    {
        //Coletando informações do usuário que está fazendo o deposito: 
        //Foi recolhido a informação do usuário logado, e pego o saldo dele.
        //Caso seja o primeiro acesso, o firstOrDefault, cria um registro no banco de dados, caso a tabela
        //cumpra com o requisito de ter os campos default setados, para não ser lançado nenhum erro.
        $balance = auth()->user()->balance()->firstOrCreate([]);
        
        //Tratamento de retorno de informação para usuário
        $response = $balance->deposit($request->value);

        //With é um session flashm ou seja, ela é criada e logo após ser utilizada ela já não 
        //existe mais
        if ($response['success'])
        {
            return redirect()
                        ->route('admin.balance') //Passa a rota para onde vai
                        ->with('success', $response['message']); //Mensagem que vai junto
        }
        return redirect()
                    ->back() //Para retornar de onde veio
                    ->with('error', $response['message']);
        
    }

    //withdraw
    public function withdrawStore(MoneyValidationFormRequest $request)
    {
        //dd($request->all());
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value);

        if($response['success'])
            return redirect()
                        ->route('admin.balance')
                        ->with('success', $response['message']);
        
        return redirect()
                    ->back()
                    ->with('error', $response['message']);

    }
}
