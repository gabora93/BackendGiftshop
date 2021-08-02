<?php // /app/Http/Middleware/Cors.php

namespace App\Http\Middleware;

use Closure;

class Cors {
    public function handle($request, Closure $next) {
        if ($request->getMethod() == "OPTIONS") {
            return response(['OK'], 200, [
                'Access-Control-Allow-Origin' => 'http://localhost:3000',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS, PATCH',
                'Access-Control-Allow-Credentials' => 'true',
                'Access-Control-Allow-Headers' => 'Origin, X-Requested-With, Content-Type, X-Auth-Token, Authorization',
            ]);
        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', 'http://localhost:3000')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS, PATCH')
            ->header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, X-Auth-Token, Authorization');
    }
}