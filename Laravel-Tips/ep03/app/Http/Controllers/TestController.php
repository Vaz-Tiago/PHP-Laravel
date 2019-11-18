<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    public function listAllUsers()
    {
        $users = User::all();
        
        return view('listAllUsers', [
           'users' => $users 
        ]);
    }
    
    //Por segurança, filtramos o tipo de dado
    //Um objeto pode ser definido como tipo de dado.
    public function listUser(User $user)
    {
        
        //Resgatando o parametro user que foi passado na rota:
        //do 6.0 em diante precisa ser o mesmo nome, antes não era necessário
        return view('listUser', [ //<- esta enviando uma array com as informações
            'user' => $user
        ]);
    }
    
    public function formAddUser()
    {
        return view('addUser');
    }
    
    //Injeção de dependencia da Request-> Illuminate\Http\Request
    public function storeUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        //Para criptografar o campo senha:
        //use Illuminate\Support\Facades\Hash
        
        $user->save(); 
        //persiste o objeto User no banco de dados
        //obejto User no caso é uma model que está em contato com a base de dados
        
        return redirect()->route('users.listAll');
    }
    
    public function formEditUser(User $user)
    {
        return view('editUser', [
            'user'=>$user
        ]);
    }
    
    
    //parametro $user é EXATAMENTE O MESMO que está sendo enviado pelo formulario
    public function edit(User $user, Request $request)
    {
        //não é necessario dar um new user, pois esta na injeção de dependecia
        
        $user->name = $request->name;
        
        //validando as informações recebidas:
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
            $user->email = $request->email;
        }
        
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        
        return redirect()->route('users.listAll');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.listAll');
    }
}
