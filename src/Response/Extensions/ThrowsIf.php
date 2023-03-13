<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Response\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

final class ThrowsIf implements Extension
{
    public function __construct(private \Closure $condition)
    {
        //
    }

    /** @param  \PreemStudio\Conformist\Contracts\Response  $extensible */
    public function register(Extensible $extensible): void
    {
        $extensible->throwIf($this->condition);
    }

    public function dependencies(): array
    {
        return [];
    }
}
