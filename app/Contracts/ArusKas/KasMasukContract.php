<?php

declare(strict_types=1);

namespace App\Contracts\ArusKas;

interface KasMasukContract
{
    public function show();
    public function store(array $data);
}