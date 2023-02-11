<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Response\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

class ThrowsIfServerError implements Extension
{
    /** @param  \PreemStudio\Conformist\Contracts\Response  $extensible */
    public function register(Extensible $extensible): void
    {
        $extensible->throwIfServerError();
    }

    public function dependencies(): array
    {
        return [];
    }
}
