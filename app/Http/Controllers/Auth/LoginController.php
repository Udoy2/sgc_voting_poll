<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Poll;
use App\Perticipant;


class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:admin')->except('logout');
            $this->middleware('guest:perticipant')->except('logout');
    }

     public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('admin.poll');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

     public function showPerticipantLoginForm()
    {
        return view('index.index_login', ['url' => 'perticipant']);
    }



    public function perticipantLogin(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|min:12|max:12'
        ]);


        if (Auth::guard('perticipant')->attempt(['code' => $request->code,'password' => 1], $request->get('remember'))) {

            return redirect()->route('perticipant.dashboard');

            
        }
        return back()->withInput($request->only('code'))->with('errorCode' , 'couldnt find the code in our records');
    }
}