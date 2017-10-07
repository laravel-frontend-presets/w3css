@extends('layouts.app')

@section('content')
<div class="w3-container w3-margin">
    <div class="w3-row">
        {{-- Offset-2 --}}
        <div class="w3-col l2 w3-container"></div>
        <div class="w3-col l8">
            <div class="w3-card form-bg">
                <h3 class="w3-padding">Register</h3>

                <div>
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="w3-container">
                            <label for="name">Name</label>

                            <div>
                                <input id="name" type="text" class="w3-input" name="name" value="{{ old('name') }}"  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="w3-container w3-text-red w3-small">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="w3-container w3-margin-top">
                            <label for="email">E-Mail Address</label>
                            <div>
                                <input id="email" type="email" class="w3-input" name="email" value="{{ old('email') }}" required>

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
                            </div>
                        </div>

                        <div class="w3-bar w3-padding">
                            <button type="submit" class="w3-bar-item w3-button w3-blue w3-round">
                                Register
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
