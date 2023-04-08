<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Response\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

final class OnError implements Extension
{
    public function __construct(private \Closure $callback)
    {
        //
    }

    /**
     * @param \PreemStudio\Conformist\Contracts\Response $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->onError($this->callback);
    }

    public function dependencies(): array
    {
        return [];
    }
}
