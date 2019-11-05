<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AspNetCoreController extends Controller
{
    public function Controllers()
    {
        return view('AspNetCore.Controllers');
    }

    public function Crud()
    {
        return view('AspNetCore.Crud');
    }

    public function Email()
    {
        return view('AspNetCore.Email');
    }

    public function InjecaoDependencias()
    {
        return view('AspNetCore.InjecaoDependencias');
    }

    public function Layout()
    {
        return view('AspNetCore.Layout');
    }

    public function Login()
    {
        return view('AspNetCore.Login');
    }

    public function Models()
    {
        return view('AspNetCore.Models');
    }

    public function Mvc()
    {
        return view('AspNetCore.Mvc');
    }

    public function Razor()
    {
        return view('AspNetCore.Razor');
    }

    public function Repository()
    {
        return view('AspNetCore.Repository');
    }

    public function ResourceFile()
    {
        return view('AspNetCore.ResourceFile');
    }

    public function Rotas()
    {
        return view('AspNetCore.Rotas');
    }
    
    public function Session()
    {
        return view('AspNetCore.Session');
    }

    public function UWork()
    {
        return view('AspNetCore.UWork');
    }

    public function Views()
    {
        return view('AspNetCore.Views');
    }

}


