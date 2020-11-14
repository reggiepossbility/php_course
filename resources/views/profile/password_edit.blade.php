@extends('layouts.master')

@section('content')
    <div class="row d-flex justify-content-center">
        <form action="{{ route('pro.password.update') }}" method="POST" class="col-8">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input class="form-control" type="password" name="current_password" placeholder="舊密碼">
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="new_password" placeholder="新密碼">
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="new_confirm_password" placeholder="新密碼確認">
            </div>

            <button type="submit" class="btn btn-primary">儲存</button>
        </form>
    </div>
@endsection
