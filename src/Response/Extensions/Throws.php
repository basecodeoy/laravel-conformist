<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Response\Extensions;

use BaseCodeOy\Conformist\Contracts\Extensible;
use BaseCodeOy\Conformist\Contracts\Extension;

final class Throws implements Extension
{
    public function __construct(private ?\Closure $callback)
    {
        //
    }

    /**
     * @param \BaseCodeOy\Conformist\Contracts\Response $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->throw($this->callback);
    }

    public function dependencies(): array
    {
        return [];
    }
}
