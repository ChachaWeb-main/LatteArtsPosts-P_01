@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mt-3 mb-3">パスワード再設定/Reset Password</h3>

            <p>
                ご登録時のメールアドレスを入力してください。<br>
                パスワード再発行用のメールをお送りします。<br>
                Please enter the email address you used when registering.<br>
                We will send you an email to reissue your password.
                
            </p>

            <hr>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif


            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mypf-login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス/Mail address">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>メールアドレスが正しくない可能性があります。<br>
                                Your email address may be incorrect.
                        </strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn mypf-submit-button w-100">
                        送信/Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

