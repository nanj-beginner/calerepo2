<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleClient;

class AuthController extends Controller
{
    /**
     * Google Client.
     *
     * @var App\Services\GoogleClient
     */
    private $client;

    public function __construct(GoogleClient $client)
    {
        $this->client = $client;
    }

    public function callback(Request $request)
    {
        $this->client->auth($request);

        return redirect()->route('report');
    }

    public function logout(Request $request)
    {
        $this->client->revoke($request);

        return redirect()->route('index');
    }
}
