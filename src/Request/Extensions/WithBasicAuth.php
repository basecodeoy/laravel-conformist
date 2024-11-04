<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Request\Extensions;

use BaseCodeOy\Conformist\Contracts\Extensible;
use BaseCodeOy\Conformist\Contracts\Extension;

final class WithBasicAuth implements Extension
{
    public function __construct(private string $username, private string $password)
    {
        //
    }

    /**
     * @param \BaseCodeOy\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->withBasicAuth($this->username, $this->password);
    }

    public function dependencies(): array
    {
        return [];
    }
}
