<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Connector;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response as Illuminate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Traits\Macroable;
use PreemStudio\Conformist\Concerns\HasExtensions;
use PreemStudio\Conformist\Contracts\Connector as Contract;
use PreemStudio\Conformist\Contracts\Response;

abstract class AbstractConnector implements Contract
{
    use HasExtensions;
    use Macroable;

    public function __construct()
    {
        $this->initializeExtensions();
    }

    public function makeRequest(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl());
    }

    public function toResponse(Illuminate $response): Response
    {
        return new \PreemStudio\Conformist\Response\Response($this, $response);
    }

    public function requestExtensions(): array
    {
        return [];
    }

    public function responseExtensions(): array
    {
        return [];
    }

    abstract public function baseUrl(): string;
}
