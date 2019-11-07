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
}
