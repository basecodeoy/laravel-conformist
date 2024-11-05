<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Contracts;

interface Extension
{
    public function register(Extensible $extensible): void;

    /**
     * @return Extension[]
     */
    public function dependencies(): array;
}
