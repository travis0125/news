    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">公告系統</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    @if (URL::current() == route('posts.index'))
                        <li class="active"><a href="{{ url('/') }}">首頁</a></li>
                    @else
                        <li ><a href="{{ url('/') }}">首頁</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li class="navbar-text">
                            <span class="glyphicon glyphicon-user"></span>
                            {{ Auth::user()->name }}
                        </li>
                        <li>
                            <a href=""><i class="fa fa-fw fa-gear"></i>個人資訊</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> 登出</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> 登入</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
