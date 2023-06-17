<?php

declare(strict_types=1);

namespace App\Contracts;

interface KasKeluarContract
{
    public function show();
    public function store(array $data);
}