<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

final class WithDigestAuth implements Extension
{
    public function __construct(private string $username, private string $password)
    {
        //
    }

    /** @param  \PreemStudio\Conformist\Contracts\Request  $extensible */
    public function register(Extensible $extensible): void
    {
        $extensible->withDigestAuth($this->username, $this->password);
    }

    public function dependencies(): array
    {
        return [];
    }
}
