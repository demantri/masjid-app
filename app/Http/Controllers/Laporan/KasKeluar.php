<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;

final class KasKeluar extends Controller
{
    public function __construct(private KasMasukContract $service) {
        $this->kode = new Code;
    }

    
}
