<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Mail\UserRegisterMail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:tbl_idma_2018_users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $userdata = array('email'=>$data['email'],'user_pass'=>$data['password']);
        $subject = 'Registration details for Indian Digital Media Awards 2018 ';
        $myEmail = $data['email'];
        //Mail::to($myEmail)->send(new UserRegisterMail( $userdata ) );
        Mail::to($myEmail)->cc(['aakash.e4mnew@gmail.com','sabita.verma@exchange4media.com','nikita.vig@exchange4media.com','priyanka.bhadouria@exchange4media.com','aditya.muvvala@exchange4media.com'])->send(new UserRegisterMail( $userdata ) ); 
        return User::create([
            'title' => $data['title'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'designation' => $data['designation'],
            'mobile' => $data['mobile'],
            'department' => $data['department'],
            'howtohear' => $data['howtohear'],
            'role' => 'subscribe',
            'status' => 'active',
            'password' => bcrypt($data['password']),
            'companylegalname' => $data['organization'],
            'companyaddress' => $data['companyaddress'],
                'city' => $data['city'],
                'Pincode' => $data['Pincode'],
                'gst' => $data['gst'],
                'twiterh' => $data['twiterh'],
                'Facebook' => $data['Facebook'],
                'stitle' => $data['stitle'],
                'sname' => $data['sname'],
                'sdesignation' => $data['sdesignation'],
                'sLandlineno' => $data['sLandlineno'],
                'smobile' => $data['smobile'],
                'semail' => $data['semail'],
                'user_pass' => $data['password']
        ]);
    }
}