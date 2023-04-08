<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\OpenApi;

final class Specification
{
    public function __construct(
        public array $specification,
        public array $definitions,
    ) {
        //
    }
}
