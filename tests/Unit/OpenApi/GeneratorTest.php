<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Connector;

use BaseCodeOy\Conformist\OpenApi\Generator;
use BaseCodeOy\Conformist\OpenApi\Parser;

it('can generate a class definition from an OpenAPI specification', function (): void {
    $parser = Parser::fromJsonFile(\realpath('tests/Fixtures/api.github.com.json'));
    $specification = $parser->parse();

    foreach ($specification->definitions as $definition) {
        expect((new Generator($specification, $definition))->toString())->toMatchSnapshot();
    }
});
