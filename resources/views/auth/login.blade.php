@extends('layouts.app')

@section('title','系統登入')

@section('header','系統登入')

@section('content')
    <div class="row">
        <div class="well col-md-4 col-md-offset-4">
            @if (count($errors) == 0)
                <div class="alert alert-info" style="text-align: center;">
                    請輸入您的帳號和密碼進行登入
                </div>
            @else
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user" ></i></span>
                    <input id="username" type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" placeholder="帳號">
                </div>
                <br>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="密碼">
                </div>
                <br>
                <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary btn-block">登入</button>
                    @if (Route::has('password.request'))
                        <br>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            忘記密碼
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection