<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\OpenApi;

use Spatie\LaravelData\Data;

class Definition extends Data
{
    public function __construct(
        public array $parameters,
        public array $requestBody,
        public string $className,
        public string $description,
        public string $externalDocs,
        public string $httpMethod,
        public string $namespace,
        public string $path,
        public string $service,
        public string $summary,
    ) {
        //
    }
}
