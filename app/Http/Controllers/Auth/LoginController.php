<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
     protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*  protected function authenticated( $user)
    {
        
        echo 'aaaaaaaaaaa<pre>';print_r($user->role);echo '</pre>'; exit;
        if($user->role == 'admin') {
            return redirect('/dashboard');
        }else if($user->role == 'jury') {
             return redirect('jury');
        }else{
        return redirect('my-account');
        }
    } */
    public function redirectPath()
    {
        $userss = Auth::user();
        if ($userss->status == 'inactive') {
           Auth::logout();
        }
    // Logic that determines where to send the user
        if ($userss->role == 'admin') {          
            return '/admin';
        }elseif($userss->role == 'jury')
        {
            return '/judge';
        }else{
        return '/dashboard';
        }
    }
    public function __construct()
    {
         
        $this->middleware('guest', ['except' => 'logout']);
    }
}
