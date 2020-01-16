<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;

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
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except('logout');
    }

    public function redirectToProvider($provider){

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){

        $results = Socialite::driver($provider)->user();

        //dd($results);
        $user_array = [
            'email' => $results->email? $results->email: null,
            'name' => $results->name? Str::slug($results->name): null,
            'password' => bin2hex(random_bytes(10))
        ];

        if(!$user_array['email'])
            return redirect('/register');

        $user = User::where('email', $user_array['email'])->first();

        if(!$user){
            $user = new User($user_array);
            $user->first_name = isset($results->user['given_name']) && !empty($results->user['given_name'])? $results->user['given_name']: null;
            $user->last_name = isset($results->user['family_name']) && !empty($results->user['family_name'])? $results->user['family_name']: null;
            $user->save();
        }

        Auth::login($user, true);
        return redirect('/');
    }

}