@extends('layouts.app')

@section('title','重設密碼')

@section('header','重設密碼')

@section('content')
    <div class="row">
        <div class="well col-md-4 col-md-offset-4">
            @if (count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $email ?? old('email') }}" placeholder="電子信箱">
                </div>
                <br>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="密碼">
                </div>
                <br>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="確認密碼">
                </div>
                <br>
                <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary btn-block">重設密碼</button>
                </div>
            </form>
        </div>
    </div>
@endsection