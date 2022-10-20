<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reviewer;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'users/home';

    protected function redirectTo(){
        if(auth()->user()->isAdmin){
            return 'backend/home';
        }else{
            return 'users/home';
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:reviewer')->except('logout');
    }

    public function logout(){
        Auth()->logout();
        Auth::guard('reviewer')->logout();
        return redirect('/');
    }

    public function showReviewerLoginForm(){
        return view('auth.reviewer_login');
    }

    public function reviewerLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        $reviewer = Reviewer::where('email', $request->email)->where('password', $request->password)->first();
        if($reviewer){
            Auth::guard('reviewer')->loginUsingId($reviewer->id);
            return redirect()->intended('/reviewers');
        }
        return redirect()->back()->withInput();

    }
}
