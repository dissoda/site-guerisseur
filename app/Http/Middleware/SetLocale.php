<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public const LANGUES_DISPONIBLES = ['fr', 'en', 'it', 'de', 'pl'];

    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale', 'fr');

        if (! in_array($locale, self::LANGUES_DISPONIBLES)) {
            $locale = 'fr';
        }

        app()->setLocale($locale);

        return $next($request);
    }
}