<?php

declare(strict_types=1);

namespace Tests\Unit\Connector;

use BaseCodeOy\Conformist\Response\AbstractResponse;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Tests\Fixtures\ForgeConnector;

it('can access the base URL', function (): void {
    expect((new ForgeConnector())->baseUrl())->toBe('https://forge.laravel.com/api/v1');
});

it('can create a request from a connector', function (): void {
    expect((new ForgeConnector())->makeRequest())->toBeInstanceOf(PendingRequest::class);
});

it('can create a response instance', function (): void {
    Http::fakeSequence()
        ->push('Hello World', 200)
        ->whenEmpty(Http::response());

    expect((new ForgeConnector())->toResponse(Http::get('https://google.com')))->toBeInstanceOf(AbstractResponse::class);
});
