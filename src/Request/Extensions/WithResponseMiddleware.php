<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Request\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;
use GuzzleHttp\Middleware;

final class WithResponseMiddleware implements Extension
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
        $extensible->withMiddleware(Middleware::mapResponse($this->callback));
    }

    public function dependencies(): array
    {
        return [];
    }
}
