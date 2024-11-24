<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Conformist\OpenApi;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class Generator
{
    public function __construct(
        private Specification $specification,
        private Definition $definition,
    ) {
        //
    }

    public function toString(): string
    {
        $stub = \file_get_contents('stubs/openapi.stub');
        $stub = \str_replace('{{ class }}', $this->definition->className, $stub);
        $stub = \str_replace('{{ extensions }}', $this->buildExtensions(), $stub);
        $stub = \str_replace('{{ externalDocs }}', $this->definition->externalDocs, $stub);
        $stub = \str_replace('{{ httpMethod }}', $this->definition->httpMethod, $stub);
        $stub = \str_replace('{{ namespace }}', $this->definition->namespace, $stub);
        $stub = \str_replace('{{ parameters }}', $this->buildParameters(), $stub);
        $stub = \str_replace('{{ path }}', $this->definition->path, $stub);

        return \str_replace('{{ service }}', $this->definition->service, $stub);
    }

    private function buildExtensions(): string
    {
        $result = '';

        if (\count($this->definition->parameters) > 0) {
            $pathParameters = $this->buildExtensionParameters('path');

            if (!empty($pathParameters)) {
                $this->buildExtensionTemplate($result, $pathParameters, 'WithUrlParameters');
            }

            $queryParameters = $this->buildExtensionParameters('query');

            if (!empty($queryParameters)) {
                $this->buildExtensionTemplate($result, $queryParameters, 'WithQueryParameters');
            }
        }

        if ($this->definition->requestBody) {
            $properties = Arr::get($this->definition->requestBody, 'content.application/json.schema.properties', []);

            if (!empty($properties)) {
                if (empty($result)) {
                    $result .= 'new WithBody(['.\PHP_EOL;
                } else {
                    $result .= \PHP_EOL.'            new WithBody(['.\PHP_EOL;
                }
            }

            foreach ($properties as $propertyName => $propertyValue) {
                $result .= $this->buildParameterLine($propertyName);
            }

            $result .= '            ]),';
        }

        if (empty($result)) {
            return '//';
        }

        return $result;
    }

    private function resolveRef(string $reference)
    {
        [$prefix, $components, $type, $parameter] = \explode('/', $reference);

        return $this->specification->specification[$components][$type][$parameter];
    }

    private function buildExtensionParameters(string $type)
    {
        $result = [];

        foreach ($this->definition->parameters as $parameter) {
            if (\array_key_exists('$ref', $parameter)) {
                $parameter = $this->resolveRef($parameter['$ref']);
            }

            if (Arr::get($parameter, 'in') === $type) {
                $result[] = $parameter;
            }
        }

        return $result;
    }

    private function buildExtensionTemplate(string &$result, array $parameters, string $className)
    {
        if (empty($result)) {
            $result .= "new {$className}([".\PHP_EOL;
        } else {
            $result .= \PHP_EOL."            new {$className}([".\PHP_EOL;
        }

        foreach ($parameters as $parameter) {
            $result .= $this->buildParameterLine($parameter['name']);
        }

        $result .= '            ]),';

        return $result;
    }

    private function buildParameterLine(string $name)
    {
        $nameCamel = Str::camel($name);

        return "                '{$name}' => \$this->{$nameCamel},".\PHP_EOL;
    }

    private function buildParameters()
    {
        $result = 'public function __constructor('.\PHP_EOL;

        foreach ($this->definition->parameters as $parameter) {
            $result .= $this->unwrapParameterLine(Arr::get($parameter, 'name', ''), $parameter);
        }

        $requestBody = Arr::get($this->definition->requestBody, 'content.application/json.schema.properties', []);

        foreach ($requestBody as $parameterName => $parameter) {
            $result .= $this->unwrapParameterLine($parameterName, $parameter);
        }

        $result .= '    ) {'.\PHP_EOL;
        $result .= '        //'.\PHP_EOL;
        $result .= '    }';

        return $result;
    }

    private function unwrapParameterLine(string $name, array $parameter)
    {
        if (\array_key_exists('$ref', $parameter)) {
            $parameter = $this->resolveRef($parameter['$ref']);
        }

        if (\array_key_exists('$ref', $parameter['schema'])) {
            $parameter['schema'] = $this->resolveRef($parameter['schema']['$ref']);
        }

        if (\array_key_exists('oneOf', $parameter['schema'])) {
            $parameter['schema'] = ['type' => Arr::flatten($parameter['schema']['oneOf'])];
        }

        $type = Arr::get($parameter, 'type') ?? Arr::get($parameter, 'schema.type') ?? Arr::get($parameter, 'items.type');

        if (\is_array($type)) {
            $type = \implode('|', $type);
        }

        $type = \str_replace(
            ['integer'],
            ['int'],
            $type,
        );

        $name = Str::camel($parameter['name'] ?? $name);

        return "        private {$type} \${$name},".\PHP_EOL;
    }
}
