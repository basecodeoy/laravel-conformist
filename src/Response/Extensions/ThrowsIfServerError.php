<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Response\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class ThrowsIfServerError implements Extension
{
    /**
     * @param \BombenProdukt\Conformist\Contracts\Response $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->throwIfServerError();
    }

    public function dependencies(): array
    {
        return [];
    }
}
