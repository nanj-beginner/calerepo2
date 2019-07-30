<?php

namespace App\Services;

use Google_Client;
use Illuminate\Http\Request;

class GoogleClient extends Google_Client
{
    public function __construct()
    {
        parent::__construct();
        $this->addScope([
            GoogleCalendar::CALENDAR_READONLY,
        ]);
        $this->setAuthConfig(config('app.credentials'));
        $this->setApplicationName(config('app.name'));
        $this->setAccessType('offline');
    }

    public function getAuthUrl()
    {
        return $this->createAuthUrl();
    }

    public function setToken(Request $request)
    {
        if ($request->session()->has('token')) {
            $this->setAccessToken($request->session()->get('token'));
        }

        if ($this->isAccessTokenExpired()) {
            $this->refresh();
            $this->setSessionToken($request);
        }
    }

    public function auth(Request $request)
    {
        $this->authenticate($request->input('code'));
        $this->setSessionToken($request);
    }

    public function revoke(Request $request)
    {
        $token = $request->session()->get('token');
        $this->revokeToken($token);
        $request->session()->forget('token');
    }

    private function setSessionToken(Request $request)
    {
        $request->session()->put('token', $this->getAccessToken());
    }

    private function refresh()
    {
        $token = $this->getAccessToken();
        $this->refreshToken($token['refresh_token']);
    }
}
