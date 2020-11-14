@extends('layouts.master')

@section('content')
    <div class="form-group">
        <form action="{{ route('search.book') }}" method="GET">
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
    </div>

    <table class="table table-borderless table-hover">
        <thead>
            <tr class="row">
                <th class="col-2">名稱</th>
                <th class="col-2">時間</th>
                <th class="col">內容</th>
                <th class="col-1"></th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($books->reverse() as $book)
                <tr class="row">
                    <td class="col-2">{{ Str::limit($book->name, 60, $end = '...') }}</td>
                    <td class="col-2">{{ Str::limit($book->time, 20, $end = '...') }}</td>
                    <td class="col">{{ Str::limit($book->detail, 100, $end = '...') }}</td>
                    <td class="col-1"> <a href="{{ route('books.show', $book) }}" class="btn btn-outline-success">看看</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
