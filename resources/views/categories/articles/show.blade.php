@extends('layouts.master')

@push('css_script')
    <style>
        .creator_photo {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

    </style>
@endpush


@section('content')
    <div class="card border-0 mb-3 ">
        <div class="card-header h1">{{ $article->title }}</div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title">引文：</h5>
                <p class="card-text">{{ $article->quote }}</p>
            </div>

            <div class="row">
                <h5 class="card-title">內容：</h5>
                <p class="card-text bk_line">{{ $article->content }}</p>
            </div>

            <div class="row mt-3 d-flex justify-content-end ">
                <div class="mr-auto">
                    <img src="{{ asset('images/profiles/' . $creator->id . '.jpg') }}" alt="..." class="creator_photo mr-1">
                    <a class="btn btn-outline-primary" href="{{ route('pro.home', $creator) }}">拜訪
                        {{ $creator->name }}</a>
                </div>

                <div class="mr-3">
                    <form action="{{ route('save.article', $article->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">收藏</button>
                    </form>
                </div>

                <div class="mr-3">
                    <a class="btn btn-outline-success" href="{{ route('articles.edit', $article) }}">編輯</a>
                </div>

            </div </div>
        </div>
    @endsection
