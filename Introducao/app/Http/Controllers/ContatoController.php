<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {

        $contatos = [
            (object) ["Nome" => "Maria", "Telefone" => "123456789"],
            (object) ["Nome" => "João", "Telefone" => "987654321"],
        ];
        return view('Contato.index', compact('contatos')); //'Diretorio.Arquivo','parametro'

        //Com o compact pode ser passado varias listas, apenas separando por virgula
    }

    //Pegando informações do formulário com método Request
    public function criar(Request $req)
    {
        //retorna tudo como array
        return $req->all();
    }

    public function editar()
    {
        return 'Este é o método EDITAR';
    }
}
