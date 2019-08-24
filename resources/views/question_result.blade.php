@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="jumbotron text-center mt-4">
                    @if($correct_flg)
                        <h4>おめでとう！あなたの解答は正解です！！！</h4>
                    @else
                        <h4>残念！あなたの解答は不正解です！！！</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection