@extends('layouts.app')

@section('content')
<div class="w3-container w3-margin">
    <div class="w3-row">
        {{-- Offset-2 --}}
        <div class="w3-col l2 w3-container"></div>
        <div class="w3-col l8">
            <div class="w3-card form-bg">
                <h3 class="w3-padding">Reset Password</h3>

                <div>
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="w3-container">
                            <label for="email">E-Mail Address</label>

                            <div>
                                <input id="email" type="email" class="w3-input" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="w3-container w3-text-red w3-small">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="w3-container w3-margin-top">
                            <label for="password">Password</label>

                            <div>
                                <input id="password" type="password" class="w3-input" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="w3-container w3-text-red w3-small">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="w3-container w3-margin-top">
                            <label for="password-confirm">Confirm Password</label>
                            <div>
                                <input id="password-confirm" type="password" class="w3-input" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="w3-container w3-text-red w3-small">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="w3-bar w3-padding">
                            <button type="submit" class="w3-bar-item w3-button w3-blue w3-round">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Offset-2 --}}
        <div class="w3-col l2 w3-container"></div>
    </div>
</div>
@endsection
