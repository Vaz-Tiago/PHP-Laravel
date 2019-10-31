<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; //-> Autenticação de usuario

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function entrar(Request $req)
    {
        $dados = $req->all();
        //Criptografia ocorre dentr do metodo do laravel
        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']]))
        {
            return redirect()->route('admin.cursos');
        }
        $erro = 'Usuario não existe';

        return redirect()->route('site.login', compact('erro'));
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
}
