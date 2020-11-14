@extends('layouts.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('註冊') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row justify-content-center">
                                <div class="col-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="姓名">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="信箱">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col-8">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="密碼">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col-8">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="確認密碼">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-8">
                                    <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="自我介紹"></textarea>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-8">
                                    <textarea class="form-control" name="interest" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="我的興趣"></textarea>
                                </div>
                            </div>


                            <div class="form-group row justify-content-center">

                                <div class="col-8">
                                    <label style="display: block" for="image">上傳大頭貼</label>
                                    <input id="image" type="file" name="image">
                                    <img style="display: block" src="#" id="category-img-tag" height="200px" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-0">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-file')
    <script src="{{ asset('js/image_preview.js') }}"></script>
@endpush
