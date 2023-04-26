<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Response\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class ThrowsUnlessStatus implements Extension
{
    public function __construct(private int $statusCode)
    {
        //
    }

    /**
     * @param \BombenProdukt\Conformist\Contracts\Response $extensible
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
