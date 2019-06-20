@extends('layouts.app')

@section('title','忘記密碼')

@section('header','忘記密碼')

@section('content')
    <div class="row">
        <div class="well col-md-4 col-md-offset-4">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (count($errors) == 0)
                <div class="alert alert-info" style="text-align: center;">
                    請輸入您的電子信箱
                </div>
            @else
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="電子信箱">
                </div>
                <br>
                <div style="text-align:center;">
                    <button type="submit" class="btn btn-primary btn-block">送出</button>
                </div>
            </form>
        </div>
    </div>
@endsection