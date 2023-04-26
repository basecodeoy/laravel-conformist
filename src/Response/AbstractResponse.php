<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\Response;

use Illuminate\Http\Client\Response as Illuminate;
use Illuminate\Support\Traits\ForwardsCalls;
use BombenProdukt\Conformist\Concerns\HasExtensions;
use BombenProdukt\Conformist\Contracts\Connector;
use BombenProdukt\Conformist\Contracts\Response;
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
