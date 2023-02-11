<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Contracts;

interface Extensible
{
    public function getExtensions(): iterable;

    public function hasExtension(string $className): bool;

    public function addExtension(Extension $extension): void;

    public function extensions(): array;
}
