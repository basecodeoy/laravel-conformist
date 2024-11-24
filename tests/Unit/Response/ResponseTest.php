<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Connector;

use Illuminate\Support\Facades\Http;
use Tests\Fixtures\ForgeConnector;

it('can access the status code', function (): void {
    Http::fakeSequence()
        ->push('Hello World', 200)
        ->whenEmpty(Http::response());

    expect((new ForgeConnector())->toResponse(Http::get('https://google.com'))->status())->toBe(200);
});
