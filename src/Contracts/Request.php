<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Contracts;

use Illuminate\Http\Client\Response as Illuminate;
use PreemStudio\Conformist\Enums\HttpMethod;

/**
 * @mixin \Illuminate\Http\Client\PendingRequest
 */
interface Request extends Extensible
{
    public function connector(): Connector;

    public function method(): HttpMethod;

    public function path(): string;

    public function process(): Response;

    public function toResponse(Illuminate $response): Response;
}
