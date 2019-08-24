<?php

namespace QuizMing\Http\Controllers\Auth;

use QuizMing\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use QuizMing\User;
use Auth;

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
    }

    public  function  index(){
        \Log::info('LoginControler@index');

        if (Auth::check()) {
            return redirect()->to('/home');
        }

        return ;
    }

    // ログアウト
    public function logout()
    {
        \Auth::logout();
        return redirect()->to('/');

    }

    //ログインボタンからリンク
    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    //Callback処理
    public function handleProviderCallback($social)
    {
        try{
            $login_info = Socialite::driver($social)->user();
        }catch(Exception $ex){
            return redirect('login/twitter');
        }
        $auth_user = $this->findOrCreate("TW", $login_info);
        \Auth::login($auth_user, true);

        return redirect()->to('/');

    }

    // ユーザー情報を返す。存在しない場合は新規登録
    protected function findOrCreate(string $login_type, $user_info)
    {
        $user = User::where('login_type', $login_type)->where('login_id', "$login_type{$user_info->id}")->first();

        if(! $user){
            // 存在しなければ新規登録
            $user = new User();
            $user->name       = $user_info->name;
            $user->status     = 1;
            $user->login_type = $login_type;
            $user->login_id   = "$login_type{$user_info->id}";
            $user->avatar     = $user_info->avatar_original;
            $user->save();
        }else{
            // ユーザー情報更新
            $user->name   = $user_info->name;
            $user->avatar = $user_info->avatar_original;
            $user->save();
        }

        return $user;
    }

}