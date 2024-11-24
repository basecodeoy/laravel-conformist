<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\Contracts;

interface Extension
{
    public function register(Extensible $extensible): void;

    /**
     * @return array<self>
     */
    public function dependencies(): array;
}
