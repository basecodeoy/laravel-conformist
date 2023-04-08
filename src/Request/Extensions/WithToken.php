<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

final class WithToken implements Extension
{
    public function __construct(private string $token, private string $type = 'Bearer')
    {
        //
    }

    /**
     * @param \PreemStudio\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->withToken($this->token, $this->type);
    }

    public function dependencies(): array
    {
        return [];
    }
}
