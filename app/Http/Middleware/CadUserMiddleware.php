<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CadUser;

class CadUserMiddleware
{

    public function __construct(User $user, CadUser $cadUser){
        $this->user = $user;
        $this->cadUser = $cadUser;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if($request->user()){
            $cadUser_check = $this->user->find($request->user()->getAttributes()['id'])->cadUser;
           if( ($cadUser_check == null) ){
                return redirect()->route('caduser.create');
           }
           else{
               return $next($request);
           }
        }
        else{
            return redirect()->route('auth.login');
        }
    }
}
