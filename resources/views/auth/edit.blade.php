@extends('layouts.app')

@section('title','更改個人設定')

@section('header','更改個人設定')

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
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">帳號</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" placeholder="帳號">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">密碼</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" placeholder="密碼">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="col-sm-3 control-label">確認密碼</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="確認密碼">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="姓名">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">信箱</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="信箱">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-6" >
                        <button type="submit" class="btn btn-primary">送出</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection