<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\Contracts;

use BaseCodeOy\Conformist\Enums\HttpMethod;
use Illuminate\Http\Client\Response as Illuminate;

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
