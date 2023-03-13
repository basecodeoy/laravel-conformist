<?php

declare(strict_types=1);

namespace Tests\Unit\Connector;

use PreemStudio\Conformist\OpenApi\Generator;
use PreemStudio\Conformist\OpenApi\Parser;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can generate a class definition from an OpenAPI specification', function () {
    $parser = Parser::fromJsonFile(realpath('tests/Fixtures/api.github.com.json'));
    $specification = $parser->parse();

    foreach ($specification->definitions as $definition) {
        assertMatchesSnapshot((new Generator($specification, $definition))->toString());
    }
});
