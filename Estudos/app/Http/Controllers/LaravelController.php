<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaravelController extends Controller
{
    public function modelsMigrations()
    {
        return view('Laravel/ModelsMigrations');
    }
}
