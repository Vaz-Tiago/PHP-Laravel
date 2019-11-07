<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AspNetCoreController extends Controller
{
    public function Area()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Area', 'submenu' => 'Area'];
        return view('AspNetCore.Area', compact('info'));
    }

    public function Controllers()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Controllers', 'submenu' => 'Controllers'];
        return view('AspNetCore.Controllers', compact('info'));
    }

    public function Crud()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'CRUD', 'submenu' => 'Crud'];
        return view('AspNetCore.Crud', compact('info'));
    }

    public function Email()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Email', 'submenu' => 'Email'];
        return view('AspNetCore.Email', compact('info'));
    }

    public function Filters()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Filters', 'submenu' => 'Filters'];
        return view('AspNetCore.Filters', compact('info'));
    }

    public function InjecaoDependencias()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Injeção de Dependências', 'submenu' => 'InjecaoDependencias'];
        return view('AspNetCore.InjecaoDependencias', compact('info'));
    }

    public function Layout()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Layout', 'submenu' => 'Layout'];
        return view('AspNetCore.Layout', compact('info'));
    }

    public function Login()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Login', 'submenu' => 'Login'];
        return view('AspNetCore.Login', compact('Login'));
    }
    
    public function Mid()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Middleware', 'submenu' => 'Mid'];
        return view('AspNetCore.Mid', compact('info'));
    }

    public function Models()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Models', 'submenu' => 'Models'];
        return view('AspNetCore.Models', compact('info'));
    }

    public function Mvc()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Mvc', 'submenu' => 'Mvc'];
        return view('AspNetCore.Mvc', compact('info'));
    }

    public function Razor()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Razor', 'submenu' => 'Razor'];
        return view('AspNetCore.Razor', compact('info'));
    }

    public function Repository()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Repository', 'submenu' => 'Repository'];
        return view('AspNetCore.Repository', compact('info'));
    }

    public function ResourceFile()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'ResourceFile', 'submenu' => 'ResourceFile'];
        return view('AspNetCore.ResourceFile', compact('info'));
    }

    public function Rotas()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Rotas', 'submenu' => 'Rotas'];
        return view('AspNetCore.Rotas', compact('info'));
    }
    
    public function Session()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Session', 'submenu' => 'Session'];
        return view('AspNetCore.Session', compact('info'));
    }

    public function UWork()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'UWork', 'submenu' => 'UWork'];
        return view('AspNetCore.UWork', compact('info'));
    }

    public function Views()
    {
        $info = ['secao' => 'AspNetCore', 'titulo' => 'Views', 'submenu' => 'Views'];
        return view('AspNetCore.Views', compact('info'));
    }

}


