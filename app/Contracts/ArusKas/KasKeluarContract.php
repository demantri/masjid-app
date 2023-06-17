<?php

declare(strict_types=1);

namespace App\Contracts\ArusKas;

interface KasKeluarContract
{
    public function show();
    public function store(array $data);
}