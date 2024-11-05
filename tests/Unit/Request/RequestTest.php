<?php

declare(strict_types=1);

namespace Tests\Unit\Connector;

use BaseCodeOy\Conformist\Response\AbstractResponse;
use Illuminate\Support\Facades\Http;
use Tests\Fixtures\ListServersRequest;

it('can send a request and receive a response instance', function (): void {
    Http::fakeSequence()
        ->push('Hello World', 200)
        ->whenEmpty(Http::response());

    expect((new ListServersRequest())->process())->toBeInstanceOf(AbstractResponse::class);
});
