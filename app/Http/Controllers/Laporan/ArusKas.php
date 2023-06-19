<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;

final class ArusKas extends Controller
{
    public function index()
    {
        return view('laporan.arus-kas.index');
    }
}
