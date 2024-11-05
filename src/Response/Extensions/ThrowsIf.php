<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Response\Extensions;

use BaseCodeOy\Conformist\Contracts\Extensible;
use BaseCodeOy\Conformist\Contracts\Extension;

final class ThrowsIf implements Extension
{
    public function __construct(private \Closure $condition)
    {
        //
    }

    /**
     * @param \BaseCodeOy\Conformist\Contracts\Response $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->throwIf($this->condition);
    }

    public function dependencies(): array
    {
        return [];
    }
}
