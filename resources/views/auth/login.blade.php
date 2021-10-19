@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mt-3 mb-3">ログイン/Login</h3>

            <hr>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mypf-login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス/Mail address">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>メールアドレスが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mypf-login-input" name="password" required autocomplete="current-password" placeholder="パスワード/Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>パスワードが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label mypf-check-label w-100" for="remember">
                            ログイン状態保持/Remember Me
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="mt-3 btn mypf-submit-button w-100">
                        ログイン/Login
                    </button>

                    <a class="btn-link mt-3 d-flex justify-content-center mypf-login-text" href="{{ route('password.request') }}">
                        パスワードをお忘れですか?/Forgot Your Password?
                    </a>
                </div>
            </form>

            <hr>

            <div class="form-group">
                <a class="btn-link mt-3 d-flex justify-content-center mypf-login-text" href="{{ route('register') }}">
                    新規登録/Register
                </a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection