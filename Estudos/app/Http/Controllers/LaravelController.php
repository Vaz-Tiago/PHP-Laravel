<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaravelController extends Controller
{
    public function modelsMigrations()
    {
        $info = ['secao' => 'Laravel', 'titulo' => 'Models && Migrations', 'submenu' => 'ModelsMigrations'];
        return view('Laravel.ModelsMigrations', compact('info'));
    }

    public function Seeders()
    {
        $info = ['secao' => 'Laravel', 'titulo' => 'Seeders', 'submenu' => 'Seeders'];
        return view('Laravel.Seeders', compact('info'));
    }

    public function AdminLTE()
    {
        $info = ['secao' => 'Laravel', 'titulo' => 'AdminLTE', 'submenu' => 'AdminLTE'];
        return view('Laravel.AdminLTE', compact('info'));
    }
}
