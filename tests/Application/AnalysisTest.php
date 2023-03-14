<?php

declare(strict_types=1);

namespace Tests\Application;

use PreemStudio\Jetpack\TestBench\AbstractAnalysisTestCase;
use SplFileInfo;

final class AnalysisTest extends AbstractAnalysisTestCase
{
    protected static function shouldAnalyzeFile(SplFileInfo $file): bool
    {
        if (str_contains($file->getRealPath(), '__snapshots__')) {
            return false;
        }

        return true;
    }

    protected static function getIgnored(): array
    {
        return [
            'Spatie\Snapshots\assertMatchesSnapshot',
        ];
    }
}
