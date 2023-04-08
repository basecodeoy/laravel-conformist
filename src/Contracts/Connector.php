<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Contracts;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response as Illuminate;

interface Connector extends Extensible
{
    public function baseUrl(): string;

    /**
     * @return Extension[]
     */
    public function requestExtensions(): array;

    /**
     * @return Extension[]
     */
    public function responseExtensions(): array;

    public function makeRequest(): PendingRequest;

    public function toResponse(Illuminate $response): Response;
}
