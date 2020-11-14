@extends('layouts.master')


@section('content')
    <form method="POST" action="{{ route('charities.update', $charity) }} ">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{ $charity->name }}">
        </div>

        <div class="form-group">
            <input type="text" name="time" class="form-control" value="{{ $charity->time }}">
        </div>

        <div class="form-group">
            <input type="text" name="venue" class="form-control" aria-describedby="venueHelp" value="{{ $charity->venue }}">
        </div>

        <div class="form-group">
            <textarea type="text" name="detail" class="form-control" rows="10">{{ $charity->detail }} </textarea>
        </div>

        <button type="submit" class="btn btn-primary">儲存</button>
    </form>

    <div class="row justify-content-end">
        <form action="{{ route('save.delete.charity', $charity->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger mr-2">取消收藏</button>
        </form>

        <form action="{{ route('join.delete.charity', $charity->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger mr-2">退出</button>
        </form>

        <form action="{{ route('charities.destroy', $charity) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">刪除</button>
        </form>
    </div>
@endsection
