<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaravelController extends Controller
{
    public function AdminLTE()
    {
        $info = 
        [
            'secao'     => 'Laravel', 
            'titulo'    => 'AdminLTE', 
            'submenu'   => 'AdminLTE'
        ];
        
        return view('Laravel.AdminLTE', compact('info'));
    }

    public function Assets()
    {
        $info = 
        [
            'secao'     => 'Laravel', 
            'titulo'    => 'Assets', 
            'submenu'   => 'Assets'
        ];
        
        return view('Laravel.Assets', compact('info'));
    }

    public function Filtros()
    {
        $info = 
        [
            'secao'     => 'Laravel', 
            'titulo'    => 'Filtros', 
            'submenu'   => 'Filtros'
        ];
        
        return view('Laravel.Filtros', compact('info'));
    }

    public function Login()
    {
        $info = 
        [
            'secao'     => 'Laravel', 
            'titulo'    => 'Login', 
            'submenu'   => 'Login'
        ];
        
        return view('Laravel.Login', compact('info'));
    }

    public function Migrations()
    {
        $info = 
        [
            'secao'     => 'Laravel', 
            'titulo'    => 'Migrations',
            'submenu'   => 'Migrations'
        ];

        return view('Laravel.Migrations', compact('info'));
    }

    public function Models()
    {
        $info = 
        [
            'secao'     => 'Laravel', 
            'titulo'    => 'Models', 
            'submenu'   => 'Models'
        ];

        return view('Laravel.models', compact('info'));
    }

    public function Paginacao()
    {
        $info =
        [
            'secao'     => 'Laravel',
            'titulo'    => 'Paginação',
            'submenu'   => 'Paginacao'
        ];

        return view('Laravel.paginacao', compact('info'));
    }

    public function Rotas()
    {
        $info =
        [
            'secao'     => 'Laravel',
            'titulo'    => 'Rotas',
            'submenu'   => 'Rotas'
        ];

        return view('Laravel.rotas', compact('info'));
    }

    public function Seeders()
    {
        $info = 
        [
            'secao'     => 'Laravel', 
            'titulo'    => 'Seeders', 
            'submenu'   => 'Seeders'
        ];

        return view('Laravel.Seeders', compact('info'));
    }

    public function ValidacaoFormulario()
    {
        $info = 
        [
            'secao'     => 'Laravel', 
            'titulo'    => 'Validação de Formulário', 
            'submenu'   => 'ValidacaoFormulario'
        ];

        return view('Laravel.validacaoFormulario', compact('info'));
    }

    public function Verbos()
    {
        $info = 
        [
            'secao'     => 'Laravel', 
            'titulo'    => 'Verbos', 
            'submenu'   => 'Verbos'
        ];

        return view('Laravel.Verbos', compact('info'));
    }

}
