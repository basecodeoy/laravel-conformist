<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\OpenApi;

use BaseCodeOy\Conformist\OpenApi\Parser;

it('can parse an OpenAPI specification from JSON', function (): void {
    $specification = Parser::fromJsonFile(\realpath('tests/Fixtures/api.github.com.json'))->parse();

    expect($specification->definitions[0]->toArray())->toEqual([
        'className' => 'Root',
        'description' => "Get Hypermedia links to resources accessible in GitHub's REST API",
        'externalDocs' => 'https://docs.github.com/rest/overview/resources-in-the-rest-api#root-endpoint',
        'httpMethod' => 'GET',
        'namespace' => 'Meta',
        'parameters' => [],
        'path' => '/',
        'requestBody' => [],
        'service' => 'GitHub',
        'summary' => 'GitHub API Root',
    ]);
});
