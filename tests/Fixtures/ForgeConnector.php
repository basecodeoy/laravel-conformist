<?php

declare(strict_types=1);

namespace Tests\Fixtures;

use BombenProdukt\Conformist\Connector\AbstractConnector;
use BombenProdukt\Conformist\Request\Extensions\AsJson;

final class ForgeConnector extends AbstractConnector
{
    public function baseUrl(): string
    {
        return 'https://forge.laravel.com/api/v1';
    }

    public function requestExtensions(): array
    {
        return [
            new AsJson(),
        ];
    }
}
