<?php

declare(strict_types=1);

namespace PreemStudio\Conformist\Response;

use Illuminate\Http\Client\Response as Illuminate;
use Illuminate\Support\Traits\ForwardsCalls;
use PreemStudio\Conformist\Concerns\HasExtensions;
use PreemStudio\Conformist\Contracts\Connector;
use PreemStudio\Conformist\Contracts\Response;
use Spatie\Macroable\Macroable;

abstract class AbstractResponse implements Response
{
    use ForwardsCalls;
    use HasExtensions;
    use Macroable;

    public function __construct(protected Connector $connector, protected Illuminate $response)
    {
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
