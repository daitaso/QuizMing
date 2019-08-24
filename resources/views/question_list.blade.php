@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm mt-5">
            <h4>
                <img src="{{$users[0]->avatar}}" class="rounded-circle mx-1" width="30" height="30" alt="Cinque Terre">
                <span class="text-primary">{{$users[0]->name}}</span>さんのクイズ
            </h4>
            <div class="jumbotron text-center mt-4">
                <p class="lead">{{$questions[0]->question}}</p>
            </div>
            @if(Auth::check() && $users[0]->login_id === Auth::user()->login_id)
                <form action="{{ url("/close?q=".base64_encode(gzcompress($questions[0]->question_id)))}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group mt-3">
                        <a href="http://twitter.com/share?text=aaa&url=http://ff7bdf9f.ngrok.io/?q=eJwLCTc0MDG0MDM1NTa1NDEzNzUyMDCMLzEqTQQAUG8GXw==" onClick="window.open(encodeURI(decodeURI(this.href)), 'tweetwindow', 'width=650, height=470, personalbar=0, toolbar=0, scrollbars=1, sizable=1'); return false;" rel="nofollow"><button  class="btn btn-dark w-100">このクイズをツイートする</button></a>
                    </div>
                </form>
            @else
                <h4>あなたの解答</h4>
                <form action="{{ url("/answer?q=".base64_encode(gzcompress($questions[0]->question_id)))}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group my-5">
                        <input type="text" name="answer" id="text1" class="form-control">
                        <button type="submit" class="btn btn-dark mt-5 w-100">解答する</button>
                    </div>
                    </form>
            @endif
    </div>
    </div>
</div>

@endsection