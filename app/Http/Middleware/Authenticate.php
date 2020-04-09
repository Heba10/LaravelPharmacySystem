<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Closure;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{


    protected $guards = [];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string[] ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if($this->guards){
            $guard = $this->guards[0];
        }else{
            $guard = null;
        }
        if (! $request->expectsJson()) {

            if ( $guard === 'admin') {
                return route('admin.login');
            }
            if($guard === 'doctor'){
                return route('doctors.login');
            }
            if($guard === 'pharmacy'){
                return route('pharmacies.login');
            }
            return route('login');
        }
    }
}
