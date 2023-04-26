<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Response\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class ThrowsIfClientError implements Extension
{
    /**
     * @param \BombenProdukt\Conformist\Contracts\Response $extensible
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
