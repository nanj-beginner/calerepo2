<?php

namespace App\Http\Controllers;

use App\Services\GoogleClient;

class HomeController extends Controller
{
    /**
     * @var App\Services\GoogleClient;
     */
    private $client;

    public function __construct(GoogleClient $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        return view('home.index')->with('url', $this->client->getAuthUrl());
    }
}
