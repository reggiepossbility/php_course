@extends('layouts.master')

@section('content')

    <form method="POST" action="{{ route('articles.update',$article) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input name="title" type="text" class="form-control form-control-lg" value="{{$article->title}}">
        </div>
        <div class="form-group">
            <input name="quote" type="text" class="form-control mt-3" value="{{$article->quote}}">
        </div>

        <div class="form-group">
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="20" >{{ $article->content }}</textarea>
        </div>
        
        <div class="form-group">
            <button id="btnSubmit" type="submit" class="btn btn-primary">發射</button>
        </div>
    </form>

    <div class="row justify-content-end">
        <form action="{{ route('save.delete.article', $article->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger mr-2">取消收藏</button>
        </form>

        <form action="{{ route('articles.destroy', $article) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">刪除</button>
        </form>
    </div>
@endsection
