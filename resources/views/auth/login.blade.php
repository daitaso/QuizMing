@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">ログイン</div>
                <div class="card-body">
                    <a href="{{ url('login/twitter')}}" class="btn btn-primary w-100"><i class="fab fa-twitter"></i> twitterでログインする</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
