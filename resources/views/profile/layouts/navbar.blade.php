<a href="{{ route('pro.home', $user) }}" class="btn btn-outline-success mr-3">首頁</a>

<div class="btn-group">
    <a class="mr-3 btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        文章
    </a>
    <div class="dropdown-menu">
        <a class="mr-3 dropdown-item" href="{{ route('pro.article', $user) }}">已創建</a>
        <a class="mr-3 dropdown-item" href="{{ route('pro.save.article', $user) }}">已收藏</a>
    </div>
</div>

<div class="btn-group">
    <a class="mr-3 btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        書籍
    </a>
    <div class="dropdown-menu">
        <a class="mr-3 dropdown-item" href="{{ route('pro.book', $user) }}">已創建</a>
        <a class="mr-3 dropdown-item" href="{{ route('pro.join.book', $user) }}">已加入</a>
        <a class="mr-3 dropdown-item" href="{{ route('pro.save.book', $user) }}">已收藏</a>
    </div>
</div>

<div class="btn-group">
    <a class="mr-3 btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        技能
    </a>
    <div class="dropdown-menu">
        <a class="mr-3 dropdown-item" href="{{ route('pro.skill', $user) }}">已創建</a>
        <a class="mr-3 dropdown-item" href="{{ route('pro.join.skill', $user) }}">已加入</a>
        <a class="mr-3 dropdown-item" href="{{ route('pro.save.skill', $user) }}">已收藏</a>
    </div>
</div>

<div class="btn-group">
    <a class="mr-3 btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        公益
    </a>
    <div class="dropdown-menu">
        <a class="mr-3 dropdown-item" href="{{ route('pro.charity', $user) }}">已創建</a>
        <a class="mr-3 dropdown-item" href="{{ route('pro.join.charity', $user) }}">已加入</a>
        <a class="mr-3 dropdown-item" href="{{ route('pro.save.charity', $user) }}">已收藏</a>
    </div>
</div>
