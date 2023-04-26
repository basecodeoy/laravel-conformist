<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Request\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

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
     * @param \BombenProdukt\Conformist\Contracts\Request $extensible
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
