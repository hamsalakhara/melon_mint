<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($this->auth->guard('admin')->check()) {
            // If authenticated, redirect to the Telegram route
            return route('showCreater'); 
        }
        // If not authenticated, redirect to the login route
        return route('showLoginForm'); 
    }
}
