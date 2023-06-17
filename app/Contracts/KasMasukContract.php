<?php

declare(strict_types=1);

namespace App\Contracts;

interface KasMasukContract
{
    public function show();
    public function store(array $data);

    // laporan
    public function showLaporan($date_from, $date_to, $kas);
}