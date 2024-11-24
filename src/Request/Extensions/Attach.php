<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\Request\Extensions;

use BaseCodeOy\Conformist\Contracts\Extensible;
use BaseCodeOy\Conformist\Contracts\Extension;

final class Attach implements Extension
{
    public function __construct(
        private string $name,
        private string $contents = '',
        private ?string $filename = null,
        private array $headers = [],
    ) {
        //
    }

    /**
     * @param \BaseCodeOy\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->attach($this->name, $this->contents, $this->filename, $this->headers);
    }

    public function dependencies(): array
    {
        return [];
    }
}
