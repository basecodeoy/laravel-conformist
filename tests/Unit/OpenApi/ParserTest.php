<?php

declare(strict_types=1);

namespace Tests\Unit\OpenApi;

use PreemStudio\Conformist\OpenApi\Parser;

it('can parse an OpenAPI specification from JSON', function () {
    $specification = Parser::fromJsonFile(realpath('tests/Fixtures/api.github.com.json'))->parse();

    expect($specification->definitions[0]->toArray())->toEqual([
        'className'    => 'Root',
        'description'  => "Get Hypermedia links to resources accessible in GitHub's REST API",
        'externalDocs' => 'https://docs.github.com/rest/overview/resources-in-the-rest-api#root-endpoint',
        'httpMethod'   => 'GET',
        'namespace'    => 'Meta',
        'parameters'   => [],
        'path'         => '/',
        'requestBody'  => [],
        'service'      => 'GitHub',
        'summary'      => 'GitHub API Root',
    ]);
});
