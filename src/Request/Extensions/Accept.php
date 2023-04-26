<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Request\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class Accept implements Extension
{
    public function __construct(private string $contentType)
    {
        //
    }

    /**
     * @param \BombenProdukt\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->accept($this->contentType);
    }

    public function dependencies(): array
    {
        return [];
    }
}
