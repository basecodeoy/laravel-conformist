<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
