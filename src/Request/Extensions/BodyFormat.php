<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

final class BodyFormat implements Extension
{
    public function __construct(private string $format)
    {
        //
    }

    /**
     * @param \PreemStudio\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->bodyFormat($this->format);
    }

    public function dependencies(): array
    {
        return [];
    }
}
