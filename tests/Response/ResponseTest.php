<?php

declare(strict_types=1);

namespace Tests\Unit\Connector;

use Illuminate\Support\Facades\Http;
use Tests\Fixtures\ForgeConnector;

it('can access the status code', function () {
    Http::fakeSequence()
        ->push('Hello World', 200)
        ->whenEmpty(Http::response());

    expect((new ForgeConnector)->toResponse(Http::get('https://google.com'))->status())->toBe(200);
});
