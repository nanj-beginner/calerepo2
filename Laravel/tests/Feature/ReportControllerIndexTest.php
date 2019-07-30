<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;

class ReportControllerIndex extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
    }

    public function testShouldRedirectWithoutToken()
    {
        $response = $this->get(route('report'));

        $response->assertStatus(302);
    }
}
