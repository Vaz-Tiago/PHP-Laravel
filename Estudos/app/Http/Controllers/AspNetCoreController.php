<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AspNetCoreController extends Controller
{
    public function login()
    {
        return view('AspNetCore/Login');
    }
    
    public function session()
    {
        return view('AspNetCore/Session');
    }

    public function Layout()
    {
        return view('AspNetCore.Layout');
    }

    public function Mvc()
    {
        return view('AspNetCore.Mvc');
    }
}
