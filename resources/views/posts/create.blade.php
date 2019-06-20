@extends('layouts.app')

@section('title', '新增公告')

@section('header', '新增公告')

@section('content')
    <div class="well col-md-6 col-md-offset-3">
        @if (count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form class="form-horizontal" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">標題</label>
                <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-sm-2 control-label">內容</label>
                <div class="col-sm-9">
                    <textarea name="content" rows="15" class="form-control" id="content" value="{{ old('content') }}"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="file_1" class="col-sm-2 control-label">附件1</label>
                <div class="col-sm-9">
                    <input type="file" name="file_1" id="file_1">
                </div>
            </div>
            <div class="form-group">
                <label for="file_2" class="col-sm-2 control-label">附件2</label>
                <div class="col-sm-9">
                    <input type="file" name="file_2" id="file_2">
                </div>
            </div>
            <div class="form-group">
                <label for="file_3" class="col-sm-2 control-label">附件3</label>
                <div class="col-sm-9">
                    <input type="file" name="file_3" id="file_3">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-6" >
                    <button type="submit" class="btn btn-primary">送出</button>
                    <input type="button" value="取消" class="btn btn-primary" onclick="location.href='{{ route('posts.index') }}'">
                </div>
            </div>
        </form>
    </div>
@endsection