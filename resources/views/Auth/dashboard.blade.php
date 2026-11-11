@extends('components.app')

@section('title', 'Dashboard')
@section('content')
    <div class="welcome-container">
        <div class="welcome-card">
            <div class="avatar-circle">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <h1 class="welcome-title">Welcome back,</h1>
            <h2 class="user-name">{{ Auth::user()->name }}</h2>
            <p class="welcome-subtitle">You are successfully logged into your account.</p>


        </div>
    </div>
@endsection
