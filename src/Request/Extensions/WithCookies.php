<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

class WithCookies implements Extension
{
    public function __construct(private array $cookies, private string $domain)
    {
        //
    }

    /** @param  \PreemStudio\Conformist\Contracts\Request  $extensible */
    public function register(Extensible $extensible): void
    {
        $extensible->withCookies($this->cookies, $this->domain);
    }

    public function dependencies(): array
    {
        return [];
    }
}
