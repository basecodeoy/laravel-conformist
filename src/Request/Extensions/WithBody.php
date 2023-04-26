<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Request\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class WithBody implements Extension
{
    public function __construct(private string $content, private string $contentType)
    {
        //
    }

    /**
     * @param \BombenProdukt\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->withBody($this->content, $this->contentType);
    }

    public function dependencies(): array
    {
        return [];
    }
}
