<?php

namespace QuizMing\Http\Controllers;

use QuizMing\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionListController extends Controller{

    public function index(Request $request){

        if (is_null($request->input('q'))) {
            return redirect()->to('/home');
        }

        //クエリパラメータ取得
        $question_id = $request->query('q');
        $question_id = gzuncompress(base64_decode($question_id));

        //問題テーブル取得
        $questions  = \QuizMing\Models\Question::where('question_id',$question_id)->get();

        //ユーザー取得
        $users  = \QuizMing\User::where('login_id',$questions[0]->user_id)->get();

        return view('question_list',compact('questions','users'));

    }
}
