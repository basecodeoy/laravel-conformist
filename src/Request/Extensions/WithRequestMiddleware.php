<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Request\Extensions;

use GuzzleHttp\Middleware;
use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class WithRequestMiddleware implements Extension
{
    public function __construct(private \Closure $callback)
    {
        //
    }

    /**
     * @param \BombenProdukt\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->withMiddleware(Middleware::mapRequest($this->callback));
    }

    public function dependencies(): array
    {
        return [];
    }
}
