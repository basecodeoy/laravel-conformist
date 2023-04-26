<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Request\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class WithToken implements Extension
{
    public function __construct(private string $token, private string $type = 'Bearer')
    {
        //
    }

    /**
     * @param \BombenProdukt\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->withToken($this->token, $this->type);
    }

    public function dependencies(): array
    {
        return [];
    }
}
