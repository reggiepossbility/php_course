@extends('profile.layouts.master')

@section('pro_content')

    {{--  <div class="form-group">
        <form action="{{ route('article.indexSearch') }}" method="GET">
            @csrf
            <div class="row">
                <div class="col-5">
                    <input class="form-control" name="search" type="text" placeholder="請輸入關鍵字">
                </div>
                <div class="col-1">
                    <button class="btn btn-primary">搜尋</button>
                </div>
            </div>
        </form>
    </div>  --}}

    <table class="table table-borderless table-hover">
        <thead>
            <tr class="row">
                <th class="col-2">標題</th>
                <th class="col-2">引文</th>
                <th class="col">內容</th>
                <th class="col-1"></th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($articles->reverse() as $article)
                <tr class="row">
                    <td class="col-2" >{{ Str::limit($article->title, 60 , $end = '...') }}</td>
                    <td class="col-2" >{{ Str::limit($article->quote, 60 , $end = '...') }}</td>
                    <td class="col" >{{ Str::limit($article->content, 70, $end = '...') }}</td>
                    <td class="col-1" > <a href="{{ route('articles.show', $article) }}" class="btn btn-outline-success">看看</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
