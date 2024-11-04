<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Response\Extensions;

use BaseCodeOy\Conformist\Contracts\Extensible;
use BaseCodeOy\Conformist\Contracts\Extension;

final class ThrowsIfClientError implements Extension
{
    /**
     * @param \BaseCodeOy\Conformist\Contracts\Response $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->throwIfClientError();
    }

    public function dependencies(): array
    {
        return [];
    }
}
