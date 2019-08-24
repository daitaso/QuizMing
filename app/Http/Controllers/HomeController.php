<?php

namespace QuizMing\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index(Request $request){

        \Log::info('HomeControler@index');

        //認証チェック
        if (!\Auth::check()) {
            echo "未認証！ログインへ";
            return redirect()->to('/login');
        }

        //出題した問題リスト
        $questions = \QuizMing\Models\Question::where('user_id',\Auth::user()->login_id)->orderBy('created_at','desc')->get();

        return view('home',compact('questions'));

    }
}
