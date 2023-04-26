<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Request\Extensions;

use BombenProdukt\Conformist\Contracts\Extensible;
use BombenProdukt\Conformist\Contracts\Extension;

final class WithDigestAuth implements Extension
{
    public function __construct(private string $username, private string $password)
    {
        //
    }

    /**
     * @param \BombenProdukt\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->withDigestAuth($this->username, $this->password);
    }

    public function dependencies(): array
    {
        return [];
    }
}
