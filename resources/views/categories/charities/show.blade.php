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
        <div class="card-header h1">{{ $charity->name }}</div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title">發起人：</h5>
                <p class="card-text">{{ $creator->name }}</p>
            </div>

            <div class="row">
                <h5 class="card-title">時間：</h5>
                <p class="card-text">{{ $charity->time }}</p>
            </div>

            <div class="row">
                <h5 class="card-title">地點：</h5>
                <p class="card-text">{{ $charity->venue }}</p>
            </div>

            <div class="row">
                <h5 class="card-title">內容：</h5>
                <p class="card-text bk_line">{{ $charity->detail }}</p>
            </div>

            <div class="row mt-3 d-flex justify-content-end ">
                <div class="mr-auto">
                    <img src="{{ asset('images/profiles/' . $creator->id . '.jpg') }}" alt="..." class="creator_photo mr-1">
                    <a class="btn btn-outline-primary" href="{{ route('pro.home', $creator) }}">拜訪 {{ $creator->name }}</a>
                </div>

                <div class="mr-3">
                    <form action="{{ route('save.charity', $charity->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">收藏</button>
                    </form>
                </div>

                <div class="mr-3">
                    <form action="{{ route('join.charity', $charity->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">加入</button>
                    </form>
                </div>

                <div class="mr-3">
                    <a class="btn btn-outline-success" href="{{ route('charities.edit', $charity) }}">編輯</a>
                </div>
            </div>
        </div 
    </div 
@endsection
