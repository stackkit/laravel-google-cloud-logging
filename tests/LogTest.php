<?php

declare(strict_types=1);

namespace Tests;

class LogTest extends TestCase
{
    /** @test */
    public function it_can_log(): void
    {
        logger()->emergency('hey');
    }
}
