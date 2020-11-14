@extends('profile.layouts.master')

@prepend('scripts')
    <style>
        *:focus {
            outline: none;
        }

    </style>
@endprepend


@section('pro_content')
    <form>
        <div class="form-group">
            <h3>關於{{ $user->name }}</h3>
            <div>
                {{ $user->bio }}
            </div>
        </div>

        <div class="form-group">
            <h3>{{ $user->name }}的興趣</h3>
            <div>
                {{ $user->interest }}
            </div>
        </div>
    </form>
@endsection
