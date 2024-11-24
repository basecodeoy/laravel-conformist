<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\Contracts;

interface Extensible
{
    public function getExtensions(): iterable;

    public function hasExtension(string $className): bool;

    public function addExtension(Extension $extension): void;

    public function extensions(): array;
}
