@extends('layouts.app')

@section('title', '最新公告')

@section('header')
    <span class="glyphicon glyphicon-bullhorn"></span>最新公告
@endsection

@section('content')
    @if (Auth::check() != false)
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('posts.create') }}" style="margin-left: 20px;margin-bottom: 15px;">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span style="padding-left: 5px;">新增公告</span>
                    </a>
                </div>
            </div>
        </div>
    @endif
    <table class="table table-striped">
        <tr>
            <td>日期</td>
            <td>標題</td>
            <td>發布者</td>
            <td>點閱數</td>
            @if (Auth::check())
                <td>功能</td>
            @endif
        </tr>
        @forelse($posts as $post)
            <tr>
                <td>{{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</td>
                <td><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->views }}</td>
                @if (Auth::check())
                    <td>
                        @can('update', $post)
                            <a href="{{ route('posts.edit', ['id'=>$post->id]) }}" class="btn btn-xs btn-primary" role="button">
                                <i class="glyphicon glyphicon-pencil"></i>
                                <span style="padding-left: 5px;">編輯</span>
                            </a>
                        @endcan
                        @can('delete', $post)
                            <form id="form" method="POST" action="{{ route('posts.destroy', ['id'=>$post->id]) }}" style="display: inline;">
                                @method('DELETE')
                                @csrf

                                <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-dialog">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    <span style="padding-left: 5px;">刪除</span>
                                </button>
                            </form>
                        @endcan
                    </td>
                 @endif
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center;">目前尚無公告</td>
            </tr>
        @endforelse
    </table>
    <div class="text-center">
        {{ $posts->links() }}
    </div>
    <!-- Modal -->
    <div id="modal-dialog" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1 class="modal-title" style="text-align: center;"><span class="glyphicon glyphicon-alert" style="color: red;font-size: 45px;"></span></h1>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;text-align: center;">請問您確定要刪除嗎？</p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <a href="#" id="btnYes" class="btn confirm"><span class="glyphicon glyphicon-ok" style="color: green;font-size: 30px;"></span></a>
                    <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary"><span class="glyphicon glyphicon-remove" style="color: red;font-size: 30px;"></span></a>
                </div>
            </div>
        </div>
    </div>
@endsection