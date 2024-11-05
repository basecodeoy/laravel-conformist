<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Request\Extensions;

use BaseCodeOy\Conformist\Contracts\Extensible;
use BaseCodeOy\Conformist\Contracts\Extension;

final class WithoutVerifying implements Extension
{
    /**
     * @param \BaseCodeOy\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->withoutVerifying();
    }

    public function dependencies(): array
    {
        return [];
    }
}
