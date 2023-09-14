<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل دخول</title>

</head>
<body>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">{{ __('تسجيل الدخول') }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3 text-end">
                                <label for="username" class="form-label">{{ __('اسم المستخدم') }}</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 text-end">
                                <label for="password" class="form-label">{{ __('كلمة المرور') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check text-end">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('تذكرني') }}</label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">{{ __('تسجيل الدخول') }}</button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link mt-2" href="{{ route('password.request') }}">
                                    {{ __('هل نسيت كلمة المرور؟') }}
                                </a>
                            @endif
                        </form>
                    </div>

                    <div class="card-footer text-center bg-light py-3">
                        <p class="mb-0">&copy; {{ date('Y') }} وحدة تكنولوجيا المعلومات والشبكات مشفى الأوروبي. جميع الحقوق محفوظة.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

</body>
</html>
