@extends('layouts.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('帳號編輯') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('pro.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row justify-content-center">
                                <div class="col">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" required autocomplete="name" autofocus value={{ $user->name }}>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" required autocomplete="email" value={{ $user->email }}>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col">
                                    <textarea class="form-control" name="bio" rows="10">{{ $user->bio }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col">
                                    <textarea class="form-control" name="interest"
                                        rows="10">{{ $user->interest }}</textarea>
                                </div>
                            </div>


                            <div class="form-group row justify-content-center">

                                <div class="col">
                                    <label style="display: block" for="image">上傳大頭貼</label>
                                    <input id="image" type="file" name="image">
                                    <img style="display: block" src="{{ asset('/images/profiles/' . $user->id . '.jpg') }}"
                                        id="category-img-tag" height="200px" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group row justify-content-start">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('儲存') }}
                                </button>

                            </div>
                        </form>
                        <div class="form-group row justify-content-end">
                            <form action="{{ route('pro.delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit">刪除帳號</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-file')
    <script src="{{ asset('js/image_preview.js') }}"></script>
@endpush
