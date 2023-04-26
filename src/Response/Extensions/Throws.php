<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Response\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class Throws implements Extension
{
    public function __construct(private ?\Closure $callback)
    {
        //
    }

    /**
     * @param \BombenProdukt\Conformist\Contracts\Response $extensible
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
