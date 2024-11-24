<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\OpenApi;

final class Definition
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

    public function toArray(): array
    {
        return [
            'parameters' => $this->parameters,
            'requestBody' => $this->requestBody,
            'className' => $this->className,
            'description' => $this->description,
            'externalDocs' => $this->externalDocs,
            'httpMethod' => $this->httpMethod,
            'namespace' => $this->namespace,
            'path' => $this->path,
            'service' => $this->service,
            'summary' => $this->summary,
        ];
    }
}
