<?php

declare(strict_types=1);

namespace BaseCodeOy\Conformist\Connector;

use BaseCodeOy\Conformist\Concerns\HasExtensions;
use BaseCodeOy\Conformist\Contracts\Connector as Contract;
use BaseCodeOy\Conformist\Contracts\Response;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response as Illuminate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Traits\Macroable;

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
        return new \BaseCodeOy\Conformist\Response\Response($this, $response);
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
