<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $registros = Curso::all();
        return view('admin.cursos.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.cursos.adicionar');
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();
        
        //tratando o campo publicado
        if (isset($dados['publicado'])) 
        {
            $dados['publicado'] = 'sim';
        }
        else
        {
            $dados['publicado'] = 'nao';
        }

        //tratando imagem
        if($req->hasFile('imagem'))
        {
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = "img/cursos/";
            $ext = $imagem->guessClientExtension(); //->Pegando extensao imagem
            $nomeImagem = "imagem_" . $num . "." . $ext;
            $imagem->move($dir, $nomeImagem); //->Movendo imagem para diretorio
            $dados['imagem'] = $dir . "/" . $nomeImagem; //->Att alterações para salvar caminho no bd

        }

        Curso::create($dados);
        return redirect()->route('admin.cursos');

    }

    public function editar(int $id)
    {
        $registro = Curso::find($id);
        return view('admin.cursos.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();
        
        //tratando o campo publicado
        if (isset($dados['publicado'])) 
        {
            $dados['publicado'] = 'sim';
        }
        else
        {
            $dados['publicado'] = 'nao';
        }

        //tratando imagem
        if($req->hasFile('imagem'))
        {
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = "img/cursos/";
            $ext = $imagem->guessClientExtension(); //->Pegando extensao imagem
            $nomeImagem = "imagem_" . $num . "." . $ext;
            $imagem->move($dir, $nomeImagem); //->Movendo imagem para diretorio
            $dados['imagem'] = $dir . "/" . $nomeImagem; //->Att alterações para salvar caminho no bd

        }

        Curso::find($id)->update($dados);

        return redirect()->route('admin.cursos');
    }

    public function deletar($id)
    {
        Curso::find($id)->delete();
        return redirect()->route('admin.cursos');
    }
}
