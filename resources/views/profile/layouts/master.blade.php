@extends('layouts.master')

@push('css_script')
    <style>
        .creator_photo {
            border-radius: 50%;
            width: 10rem;
            height: 10rem;
        }

    </style>
@endpush

@section('content')

    <div class="row align-items-center form-group">
        <img src="{{ asset('images/profiles/' . $user->id . '.jpg') }}" alt="..." class="creator_photo mr-3">
        <h1>{{ $user->name }}</h1>
    </div>

    <div class="form-group">
        @include('profile.layouts.navbar')
    </div>

    @yield('pro_content')

@endsection

