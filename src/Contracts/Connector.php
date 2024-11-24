<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\Contracts;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response as Illuminate;

interface Connector extends Extensible
{
    public function baseUrl(): string;

    /**
     * @return array<Extension>
     */
    public function requestExtensions(): array;

    /**
     * @return array<Extension>
     */
    public function responseExtensions(): array;

    public function makeRequest(): PendingRequest;

    public function toResponse(Illuminate $response): Response;
}
