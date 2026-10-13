<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Force HTTPS for GitHub Codespaces URLs.
        if (
            app()->environment('local') &&
            str_ends_with(
                (string) config('app.url'),
                '.app.github.dev'
            )
        ) {
            URL::forceScheme('https');
        }

        // Limit repeated login attempts.
        RateLimiter::for('login', function (Request $request) {
            $email = Str::lower(
                Str::transliterate($request->input('email', ''))
            );

            return [
                Limit::perMinute(5)->by(
                    'login-email-ip:' . $email . '|' . $request->ip()
                ),
                Limit::perMinute(30)->by(
                    'login-ip:' . $request->ip()
                ),
            ];
        });
    }
}
