<?php
namespace App\Http\Middleware;
use Closure;
use Session;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
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
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('user-login');
            }
        }else{
            $user = User::where('id','=',Auth::user()->id)->first();
            if($user->status == 'inactive'){
                Auth::logout();
                return redirect()->route('user-login')->with('flash_message', 'Your account is now in-active.');
            }
        }
        return $next($request);
    }
}