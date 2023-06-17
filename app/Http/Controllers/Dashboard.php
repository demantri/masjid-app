<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

final class Dashboard extends Controller
{
    public function index() 
    {
        return view('dashboard');
    }
}
