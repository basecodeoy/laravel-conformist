<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

final class Attach implements Extension
{
    public function __construct(
        private string $name,
        private string $contents = '',
        private ?string $filename = null,
        private array $headers = [],
    ) {
        //
    }

    /**
     * @param \PreemStudio\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->attach($this->name, $this->contents, $this->filename, $this->headers);
    }

    public function dependencies(): array
    {
        return [];
    }
}
