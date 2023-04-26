<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Request\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class Sink implements Extension
{
    public function __construct(private string $to)
    {
        //
    }

    /**
     * @param \BombenProdukt\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->sink($this->to);
    }

    public function dependencies(): array
    {
        return [];
    }
}
