<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Request\Extensions;

use BaseCodeOy\Conformist\Contracts\Extensible;
use BaseCodeOy\Conformist\Contracts\Extension;

final class WithCookies implements Extension
{
    public function __construct(private array $cookies, private string $domain)
    {
        //
    }

    /**
     * @param \BaseCodeOy\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->withCookies($this->cookies, $this->domain);
    }

    public function dependencies(): array
    {
        return [];
    }
}
