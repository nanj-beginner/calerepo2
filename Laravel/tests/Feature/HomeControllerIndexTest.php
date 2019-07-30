<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeControllerIndex extends TestCase
{
    public function testCanAccess()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHasOAuthUrl()
    {
        $response = $this->get('/');

        $response->assertSee('https://accounts.google.com/o/oauth2/auth?');
    }
}
