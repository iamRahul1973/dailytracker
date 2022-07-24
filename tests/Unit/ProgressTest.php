<?php

namespace Tests\Unit;

use App\Models\Progress;
use Tests\TestCase;

class ProgressTest extends TestCase
{
    /** @test */
    function it_returns_array_of_statuses()
    {
        $statuses = Progress::status();
        $this->assertIsArray($statuses);
    }
}
