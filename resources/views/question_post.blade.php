@extends('layout')
@section('content')

<div class="container">
    <form action="{{ url('/post/post')}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm">
                <div class="md-form mt-5">
                    <h4>問題文</h4>
                    <textarea id="form7" name="question" class="md-textarea form-control " rows="5"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group mt-5">
                    <h4>正答</h4>
                    <input type="text" name="answer" id="text1" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <button type="submit" class="btn btn-dark mt-5 w-100">出題する！</button>
            </div>
        </div>

    </form>
</div>

@endsection