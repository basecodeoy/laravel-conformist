<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

class Retry implements Extension
{
    public function __construct(
        private int $times,
        private int $sleepMilliseconds = 0,
        private ?\Closure $when = null,
        private bool $throw = true
    ) {
        //
    }

    /** @param  \PreemStudio\Conformist\Contracts\Request  $extensible */
    public function register(Extensible $extensible): void
    {
        $extensible->retry($this->times, $this->sleepMilliseconds, $this->when, $this->throw);
    }

    public function dependencies(): array
    {
        return [];
    }
}
