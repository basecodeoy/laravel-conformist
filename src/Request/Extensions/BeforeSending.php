<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

final class BeforeSending implements Extension
{
    public function __construct(private \Closure $callback)
    {
        //
    }

    /**
     * @param \PreemStudio\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->beforeSending($this->callback);
    }

    public function dependencies(): array
    {
        return [];
    }
}
