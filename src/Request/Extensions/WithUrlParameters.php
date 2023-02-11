<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

class WithUrlParameters implements Extension
{
    public function __construct(private array $parameters)
    {
        //
    }

    /** @param  \PreemStudio\Conformist\Contracts\Request  $extensible */
    public function register(Extensible $extensible): void
    {
        $extensible->withUrlParameters($this->parameters);
    }

    public function dependencies(): array
    {
        return [];
    }
}
