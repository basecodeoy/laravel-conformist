<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\OpenApi;

use Spatie\LaravelData\Data;

final class Specification extends Data
{
    public function __construct(
        public array $specification,
        public array $definitions,
    ) {
        //
    }
}
