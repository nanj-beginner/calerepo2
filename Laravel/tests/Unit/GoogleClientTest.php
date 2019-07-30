<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\GoogleClient;
use App\Services\GoogleCalendar;

class GoogleClientTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testConstructor()
    {
        $client = new GoogleClient();
        // check scope.
        $this->assertEquals([GoogleCalendar::CALENDAR_READONLY], $client->getScopes());
        // check access type.
        $this->assertEquals('offline', $client->getConfig('access_type'));
    }

    public function testGetAuthUrl()
    {
        $client = new GoogleClient();

        $this->assertContains('https://accounts.google.com/o/oauth2/auth', $client->getAuthUrl());
    }
}
