<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Request\Extensions;

use BaseCodeOy\Conformist\Contracts\Extensible;
use BaseCodeOy\Conformist\Contracts\Extension;

final class Retry implements Extension
{
    public function __construct(
        private int $times,
        private int $sleepMilliseconds = 0,
        private ?\Closure $when = null,
        private bool $throw = true,
    ) {
        //
    }

    /**
     * @param \BaseCodeOy\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->retry($this->times, $this->sleepMilliseconds, $this->when, $this->throw);
    }

    public function dependencies(): array
    {
        return [];
    }
}
