<?php

declare(strict_types=1);

namespace BombenProdukt\Conformist\OpenApi;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use InvalidArgumentException;
use BombenProdukt\Conformist\Enums\HttpMethod;

final class Parser
{
    private function __construct(public array $specification)
    {
        //
    }

    public static function fromJsonFile(string $file): self
    {
        return new self(\json_decode(\file_get_contents($file), true));
    }

    public function parse(): Specification
    {
        /** @var Definition[] */
        $result = [];

        foreach ($this->specification['paths'] as $path => $definition) {
            [$httpMethod, $definition] = $this->definitionFromMethod($definition);
            [$namespace, $className] = \explode('/', $definition['operationId']);

            $result[] = new Definition(
                className: Str::studly($className),
                description: $definition['description'],
                externalDocs: $definition['externalDocs']['url'],
                httpMethod: $httpMethod->name,
                namespace: Str::studly($namespace),
                parameters: Arr::get($definition, 'parameters', []),
                path: $path,
                requestBody: Arr::get($definition, 'requestBody', []),
                service: \explode(' ', $this->specification['info']['title'])[0],
                summary: $definition['summary'],
            );
        }

        return new Specification($this->specification, $result);
    }

    private function definitionFromMethod(array $definition): array
    {
        if (\array_key_exists('get', $definition)) {
            return [HttpMethod::GET, $definition['get']];
        }

        if (\array_key_exists('post', $definition)) {
            return [HttpMethod::POST, $definition['post']];
        }

        if (\array_key_exists('put', $definition)) {
            return [HttpMethod::PUT, $definition['put']];
        }

        if (\array_key_exists('patch', $definition)) {
            return [HttpMethod::PATCH, $definition['patch']];
        }

        if (\array_key_exists('delete', $definition)) {
            return [HttpMethod::DELETE, $definition['delete']];
        }

        if (\array_key_exists('options', $definition)) {
            return [HttpMethod::OPTIONS, $definition['options']];
        }

        throw new InvalidArgumentException('Failed to determine HTTP method.');
    }
}
