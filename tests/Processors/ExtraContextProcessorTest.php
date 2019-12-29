<?php

namespace Hedii\LaravelGelfLogger\Tests\Processors;

use Hedii\LaravelGelfLogger\Processors\ExtraContextProcessor;
use PHPUnit\Framework\TestCase;

class ExtraContextProcessorTest extends TestCase
{
    /** @test */
    public function it_should_merge_global_context_and_local_context(): void
    {
        $payload = [
            'context' => [
                'key1' => 'bar',
            ]
        ];

        $dummyConfig = [
            'extra' => [
                'key2' => 'foo',
            ]
        ];

        $processor = new ExtraContextProcessor($dummyConfig);

        $this->assertSame([
            'context' => [
                'key1' => 'bar',
                'key2' => 'loo',
            ]
        ], $processor($payload));
    }
}

