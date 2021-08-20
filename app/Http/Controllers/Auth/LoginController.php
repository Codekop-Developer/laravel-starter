<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $ip         = $_SERVER['REMOTE_ADDR']; 	# menangkap ip pengunjung
        $location   = $_SERVER['PHP_SELF'];		# menangkap server path
        $browser    = $_SERVER['HTTP_USER_AGENT']; # menangkap browser yang di pakai
        $date       = date('Y-m-d H:i:s');

        $remember = $request->has('remember') ? true : false;
        $credentials = $request->only('email', 'password');
        $validator = \Validator::make($request->all(),[
            'email'     => 'required|string',
            'password'  => 'required|string',
        ]);
        if($validator->passes())
        {
            if (auth()->attempt([
                'email'     => $request->input('email'), 
                'password'  => $request->input('password')
            ], $remember)) {

                if(auth()->user()->active == 1){
                    $aktif  = 'success';
                    $route  = 'dashboard.index';
                    $status = 'success';
                    $msg    = __('action.login_success', ['name' => auth()->user()->name]);

                }elseif(auth()->user()->active == 2){
                    $aktif  = 'banned';
                    $route  = 'login';
                    $status = 'failed';
                    $msg    = __('action.login_banned');
                    auth()->logout();
                    session()->flush();

                }else{
                    $aktif  = 'non active';
                    $route  = 'login';
                    $status = 'failed';
                    $msg    = __('action.login_nonactive');
                    auth()->logout();
                    session()->flush();

                }

                $log = [
                        'ip'        => $ip,
                        'location'  => $location,
                        'browser'   => $browser,
                        'status'    => $aktif,
                        'email'     => $request->input('email'),
                        'created_at'=> $date,
                    ];
                DB::table('users_log')->insert($log);

                return redirect()->route("$route")->with($status, $msg);

            }else{

                $log = [
                        'ip'        => $ip,
                        'location'  => $location,
                        'browser'   => $browser,
                        'status'    => "failed",
                        'email'     => $request->input('email'),
                        'created_at'=> $date,
                    ];
                DB::table('users_log')->insert($log);

                return redirect()->route('login')->with('failed', __('auth.failed'));
            }
        }else{
            $log = [
                    'ip'        => $ip,
                    'location'  => $location,
                    'browser'   => $browser,
                    'status'    => "failed",
                    'email'     => $request->input('email'),
                    'created_at'=> $date,
                ];
            DB::table('users_log')->insert($log);

            return redirect()->back()->withErrors($validator)->with('failed', __('auth.failed'));
        }
        // if failed login
        // return redirect('login');
    }
}
