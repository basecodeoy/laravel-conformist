<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\Response;

use BaseCodeOy\Conformist\Concerns\HasExtensions;
use BaseCodeOy\Conformist\Contracts\Connector;
use BaseCodeOy\Conformist\Contracts\Response;
use Illuminate\Http\Client\Response as Illuminate;
use Illuminate\Support\Traits\ForwardsCalls;
use Spatie\Macroable\Macroable;

abstract class AbstractResponse implements Response
{
    use ForwardsCalls;
    use HasExtensions;
    use Macroable;

    public function __construct(
        protected readonly Connector $connector,
        protected Illuminate $response,
    ) {
        foreach ($connector->responseExtensions() as $extension) {
            $this->addExtension($extension);
        }

        $this->initializeExtensions();
    }

    public function __call(string $name, array $arguments)
    {
        return $this->forwardCallTo($this->response, $name, $arguments);
    }
}
