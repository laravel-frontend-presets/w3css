@extends('layouts.app')

@section('content')
<div class="w3-container">
    <div class="w3-row">
        {{-- Offset-2 --}}
        <div class="w3-col l2 w3-container"></div>
        <div class="w3-col l8">
            <div class="w3-container">
                <h3>Dashboard</h3>
                <div class="w3-panel w3-pale-green w3-padding">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
        {{-- Offset-2 --}}
        <div class="w3-col l2 w3-container"></div>
    </div>
</div>
@endsection
