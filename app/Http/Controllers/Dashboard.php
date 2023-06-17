<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

final class Dashboard extends Controller
{
    public function index() 
    {
        // dd(password_hash('123123', PASSWORD_BCRYPT));
        // $password = password_hash('123123', PASSWORD_BCRYPT);
        // dd(password_verify('123123', $password));
        return view('dashboard');
    }
}
