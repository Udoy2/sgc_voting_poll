<?php

namespace App\Http\Middleware;

use Closure;
use App\Poll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $poll = Poll::findOrFail(Auth::user()->poll_id);
        if($poll->login_permission == 1){
            if(Poll::where('is_published','1')->get()->isNotEmpty()){
                $published_poll = Poll::where('is_published','1')->first();
                if($poll->id !=  $published_poll->id){
                    Auth::logout();
                    Session::flush();
                    return redirect('/')->with('errorCode' , 'Your code has been disabled!!!');
                }
            }
            return $next($request);
        }else{
            Auth::logout();
            Session::flush();
            return redirect('/')->with('errorCode' , 'Your code has been disabled!!');
            
        }
        
    }
}
