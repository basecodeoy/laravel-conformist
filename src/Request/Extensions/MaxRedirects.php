<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

class MaxRedirects implements Extension
{
    public function __construct(private int $max)
    {
        //
    }

    /** @param  \PreemStudio\Conformist\Contracts\Request  $extensible */
    public function register(Extensible $extensible): void
    {
        $extensible->maxRedirects($this->max);
    }

    public function dependencies(): array
    {
        return [];
    }
}
