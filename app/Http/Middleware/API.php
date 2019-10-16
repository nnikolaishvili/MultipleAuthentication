<?php

namespace App\Http\Middleware;

use App\AccessToken;
use App\Token;
use Illuminate\Http\Request;
use Closure;
use App\Traits\ResponseTrait;

class API
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        AccessToken::checkToken(request()->header('Auth'));

        if (!auth()->check()) {
            return $this->getJsonError('You are not authorised');
        }

        return $next($request);
    }
}
