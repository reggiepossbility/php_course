<div class="mb-5">
    <a class="mr-3 btn btn-lg btn-outline-primary" role="button" href="{{ url('/') }}">首頁</a>
    <a class="mr-3 btn btn-lg btn-outline-primary" role="button" href="{{ route('books.index') }}">書籍</a>
    <a class="mr-3 btn btn-lg btn-outline-primary" role="button" href="{{ route('skills.index') }}">技能</a>
    <a class="mr-3 btn btn-lg btn-outline-primary" role="button" href="{{ route('charities.index') }}">公益</a>
    <a class="mr-3 btn btn-lg btn-outline-primary" role="button" href="{{ route('articles.index') }}">文章</a>



    @if (auth()->check())
        <div class="btn-group mr-3">
            <a class="btn btn-lg btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                建立
            </a>
            <div class="dropdown-menu">
                <a class="btn btn-lg dropdown-item" href="{{ route('books.create') }}">書籍</a>
                <a class="btn btn-lg dropdown-item" href="{{ route('skills.create') }}">技能</a>
                <a class="btn btn-lg dropdown-item" href="{{ route('charities.create') }}">公益</a>
                <a class="btn btn-lg dropdown-item" href="{{ route('articles.create') }}">文章</a>
            </div>
        </div>

        <div class="btn-group mr-3">
            <a class="btn btn-lg btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Hello {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu">
                <a class="btn btn-lg dropdown-item" href="{{ route('pro.home', auth()->user()) }}">個人頁面</a>
                <a class="btn btn-lg dropdown-item" href="{{ route('pro.edit') }}">帳號編輯</a>
                <a class="btn btn-lg dropdown-item" href="{{ route('pro.password.edit') }}">密碼變更</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="btn btn-lg dropdown-item" href="{{ route('logout') }}"></a>
                    <button class="btn btn-lg dropdown-item" type="submit">登出</button>
                </form>
            </div>
        </div>
    @else
        <a class="mr-3 btn btn-lg btn-outline-primary" role="button" href="{{ route('login') }}">登入</a>
        <a class="btn btn-lg btn-outline-primary" role="button" href="{{ route('register') }}">註冊</a>
    @endif
</div>
