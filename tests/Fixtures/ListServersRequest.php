<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use BaseCodeOy\Conformist\Contracts\Connector;
use BaseCodeOy\Conformist\Enums\HttpMethod;
use BaseCodeOy\Conformist\Request\AbstractRequest;

final class ListServersRequest extends AbstractRequest
{
    public function path(): string
    {
        return '/servers';
    }

    public function connector(): Connector
    {
        return new ForgeConnector();
    }

    public function method(): HttpMethod
    {
        return HttpMethod::GET;
    }
}
