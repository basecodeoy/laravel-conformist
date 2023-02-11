<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

class AsMultipart implements Extension
{
    /** @param  \PreemStudio\Conformist\Contracts\Request  $extensible */
    public function register(Extensible $extensible): void
    {
        $extensible->asMultipart();
    }

    public function dependencies(): array
    {
        return [];
    }
}
