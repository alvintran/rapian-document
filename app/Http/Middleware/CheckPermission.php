<?php

namespace Nht\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class CheckPermission
{
    protected $auth;
    /**
     * Creates a new instance of the middleware.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles = '', $permissions = '')
    {
        if ($this->userHasAccessTo($request, $roles, $permissions))
        {
            view()->share('currentUser', $request->user());
            return $next($request);
        }
        return view('errors/403');
    }

    public function userHasAccessTo($request, $roles, $permissions)
    {
        $action = $request->route()->getAction();
        $roles = isset($action['roles']) ? ($roles . '|' . $action['roles']) : $roles;
        $permissions = isset($action['permissions']) ? ($permissions . '|' . $action['permissions']) : $permissions;

        $roles = empty($roles) ? null : explode('|', $roles);
        $permissions = empty($permissions) ? null : explode('|', $permissions);

        $roles[] = 'superadmin';
        return !$this->auth->guest() && $request->user()->ability($roles, $permissions);
    }
}
