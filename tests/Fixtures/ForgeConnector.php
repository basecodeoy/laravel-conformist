<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Fixtures;

use BaseCodeOy\Conformist\Connector\AbstractConnector;
use BaseCodeOy\Conformist\Request\Extensions\AsJson;

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
