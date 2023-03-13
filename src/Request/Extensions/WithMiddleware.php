<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

final class WithMiddleware implements Extension
{
    public function __construct(private \Closure $middleware)
    {
        //
    }

    /** @param  \PreemStudio\Conformist\Contracts\Request  $extensible */
    public function register(Extensible $extensible): void
    {
        $extensible->withMiddleware($this->middleware);
    }

    public function dependencies(): array
    {
        return [];
    }
}
