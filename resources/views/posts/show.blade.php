@extends('layouts.app')

@section('title', $post->title)

@section('header', $post->title)

@section('content')
    <div class="well col-md-6 col-md-offset-3">
        <table class="table table-bordered">
            <tr>
                <td>日期</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            <tr>
                <td>內容</td>
                <td>{!! $post->content !!}</td>
            </tr>
            <tr>
                <td>附件</td>
                <td>
                    @if ($post->file_1 != null)
                        <a href="{{ route('download', $post->file_1) }}">{{ $post->file_1 }}</a><br>
                    @endif
                    @if ($post->file_2 != null)
                        <a href="{{ route('download', $post->file_2) }}">{{ $post->file_2 }}</a><br>
                    @endif
                    @if ($post->file_3 != null)
                        <a href="{{ route('download', $post->file_3) }}">{{ $post->file_3 }}</a>
                    @endif
                </td>
            </tr>
        </table>
        <div style="text-align: center;">
            <a href="javascript:window.history.go(-1)">回上一頁</a>
        </div>
    </div>
@endsection