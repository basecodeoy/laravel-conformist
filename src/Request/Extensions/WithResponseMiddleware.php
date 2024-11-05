<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Request\Extensions;

use BaseCodeOy\Conformist\Contracts\Extensible;
use BaseCodeOy\Conformist\Contracts\Extension;
use GuzzleHttp\Middleware;

final class WithResponseMiddleware implements Extension
{
    public function __construct(private \Closure $callback)
    {
        //
    }

    /**
     * @param \BaseCodeOy\Conformist\Contracts\Request $extensible
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
