<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Request\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class WithCookies implements Extension
{
    public function __construct(private array $cookies, private string $domain)
    {
        //
    }

    /**
     * @param \BombenProdukt\Conformist\Contracts\Request $extensible
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
