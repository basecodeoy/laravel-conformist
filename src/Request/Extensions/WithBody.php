<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request\Extensions;

use PreemStudio\Conformist\Contracts\Extensible;
use PreemStudio\Conformist\Contracts\Extension;

final class WithBody implements Extension
{
    public function __construct(private string $content, private string $contentType)
    {
        //
    }

    /**
     * @param \PreemStudio\Conformist\Contracts\Request $extensible
     */
    public function register(Extensible $extensible): void
    {
        $extensible->withBody($this->content, $this->contentType);
    }

    public function dependencies(): array
    {
        return [];
    }
}
