<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\OpenApi;

final class Specification
{
    public function __construct(
        public readonly array $specification,
        public readonly array $definitions,
    ) {
        //
    }
}
