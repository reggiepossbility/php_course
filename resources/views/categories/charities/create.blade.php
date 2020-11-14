@extends('layouts.master')


@section('content')
    <form action="{{ route('charities.store') }} " method="POST">
        @csrf

        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="公益">
        </div>

        <div class="form-group">
            <input type="text" name="time" class="form-control" placeholder="時間">
        </div>

        <div class="form-group">
            <input type="text" name="venue" class="form-control" aria-describedby="venueHelp" placeholder="地點">
        </div>

        <div class="form-group">
            <textarea type="text" name="detail" class="form-control" rows="3" placeholder="內容"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">建立</button>
    </form>
@endsection
