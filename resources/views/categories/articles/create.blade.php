@extends('layouts.master')

@section('content')

    <form method="POST" action="{{ route('articles.store') }}">
        @csrf
        <div class="form-group">
            <input name="title" type="text" class="form-control form-control-lg" placeholder="標題">
        </div>
        <div class="form-group">
            <input name="quote" type="text" class="form-control mt-3" placeholder="引文">
        </div>

        <div class="form-group">
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="20"
                placeholder="內容"></textarea>
        </div>
        
        <div class="form-group">
            <button id="btnSubmit" type="submit" class="btn btn-primary">發射</button>
        </div>
    </form>
@endsection
