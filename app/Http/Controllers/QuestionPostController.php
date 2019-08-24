<?php

namespace QuizMing\Http\Controllers;

use QuizMing\Models\Question;
use QuizMing\Models\Answer;

use Illuminate\Http\Request;

class QuestionPostController extends Controller{

    //
    public function index(Request $request){

        //認証チェック
        if (!\Auth::check()) {
            echo "未認証！ログインへ";
            return redirect()->to('/login');
        }

        return view('question_post');
    }

    public function post(Request $request){

        $question = new Question();

        // question_id採番
        $question->question_id    = \Auth::user()->login_id.'_'.substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 4);
        $question->question     = $request->question;
        $question->user_id    = \Auth::user()->login_id;
        $question->correct_answer = $request->answer;
        $question->good_num   = 0;
        $question->save();

        return redirect()->to('/?q='.base64_encode(gzcompress($question->question_id)));

        return redirect($url);
    }

    //
    // 解答する
    //
    public function answer(Request $request){

        $question_id = $request->query('q');
        $question_id = gzuncompress(base64_decode($question_id));

        //問題テーブル取得
        $questions  = \QuizMing\Models\Question::where('question_id',$question_id)->get();

        //解答テーブルにレコード挿入
        $answer = new Answer();
        $answer->question_id = $question_id;
        if(\Auth::check()) {
            $answer->user_id = \Auth::user()->login_id;
        }else{
            $answer->user_id = 'guest';
        }
        $answer->answer      = $request->input('answer');
        $answer->save();

        $correct_flg = false;
        if($questions[0]->correct_answer === $answer->answer){
            $correct_flg = true;
        }

        return view('question_result',compact('correct_flg'));

    }

}
