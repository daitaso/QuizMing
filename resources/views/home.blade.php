@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <h4 class="mt-5 mb-4">クイズを出題する</h4>
            <a href="{{url("/post")}}" class="btn btn-primary btn-block"><i class="fas fa-pen">&nbsp;出題する！</i></a>
        </div>
    </div>
    @if(count($questions) !== 0)
        <div class="row justify-content-center">
            <div class="col-md">
                <h4 class="mt-5 mb-4">出題したクイズ</h4>
            </div>
        </div>
    @endif

    <div class="row">
    @foreach($questions as $question)
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-header">
                    <a href=""><i class="fab fa-twitter"></i></a>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="{{url('/?q='.base64_encode(gzcompress($question->question_id)))}}" >{{$question->question}}</a></h5>
                </div>
                <div class="card-footer">
                    <p class="card-text"><small class="text-muted">{{$question->created_at}}</small></p>
                </div>
            </div>
        </div>
    @endforeach
    </div>

</div>

@endsection

