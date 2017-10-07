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
                    @if (session('status'))
                        <div class="w3-panel w3-pale-green">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="w3-container">
                            <label for="email">E-Mail Address</label>

                            <div>
                                <input id="email" type="email" class="w3-input" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="w3-container w3-text-red w3-small">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="w3-bar w3-padding w3-margin-top">
                            <button type="submit" class="w3-bar-item w3-button w3-blue w3-round">
                                Send Password Reset Link
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
