<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Request;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response as Illuminate;
use Illuminate\Support\Traits\ForwardsCalls;
use Illuminate\Support\Traits\Macroable;
use PreemStudio\Conformist\Concerns\HasExtensions;
use PreemStudio\Conformist\Contracts\Connector;
use PreemStudio\Conformist\Contracts\Request;
use PreemStudio\Conformist\Contracts\Response;
use PreemStudio\Conformist\Enums\HttpMethod;

abstract class AbstractRequest implements Request
{
    use ForwardsCalls;
    use HasExtensions;
    use Macroable;

    private PendingRequest $pendingRequest;

    public function __construct()
    {
        $this->pendingRequest = $this->connector()->makeRequest();

        foreach ($this->connector()->requestExtensions() as $extension) {
            $this->addExtension($extension);
        }

        $this->initializeExtensions();
    }

    public function __call(string $name, array $arguments)
    {
        return $this->forwardCallTo($this->pendingRequest, $name, $arguments);
    }

    public function process(): Response
    {
        $httpMethod = \mb_strtolower($this->method()->name);

        return $this->toResponse($this->pendingRequest->{$httpMethod}($this->path()));
    }

    public function toResponse(Illuminate $response): Response
    {
        return $this->connector()->toResponse($response);
    }

    abstract public function connector(): Connector;

    abstract public function method(): HttpMethod;

    abstract public function path(): string;
}
