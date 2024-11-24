<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\Response\Extensions;

use BaseCodeOy\Conformist\Contracts\Extensible;
use BaseCodeOy\Conformist\Contracts\Extension;

final class ThrowsUnlessStatus implements Extension
{
    public function __construct(
        private int $statusCode,
    ) {
        //
    }

    /**
     * @param \BaseCodeOy\Conformist\Contracts\Response $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->throwUnlessStatus($this->statusCode);
    }

    public function dependencies(): array
    {
        return [];
    }
}
