@extends('components.app')

@section('title', 'Login')

@section('content')
    <main class="d-flex align-items-center justify-content-center min-vh-100 bg-light py-5">
        <div class="w-100" style="max-width: 420px;">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-sm-5">

                    <div class="text-center mb-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm"
                            style="width: 52px; height: 52px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                <polyline points="10 17 15 12 10 7"></polyline>
                                <line x1="15" y1="12" x2="3" y2="12"></line>
                            </svg>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Welcome back!</h3>
                        <p class="text-muted small">Sign in to your account to continue</p>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger d-flex align-items-center rounded-3 mb-4" role="alert">
                            <svg class="flex-shrink-0 me-2" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="8" x2="12" y2="13" />
                                <circle cx="12" cy="16" r="0.5" fill="currentColor" />
                            </svg>
                            <div class="small fw-medium">{{ session('error') }}</div>
                        </div>
                    @endif

                    <form action="{{ route('login.store') }}" method="POST" id="loginForm" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-secondary fw-semibold small" for="email">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                        <polyline points="22,6 12,13 2,6" />
                                    </svg>
                                </span>
                                <input type="email" id="email" name="email"
                                    class="form-control border-start-0 bg-light @error('email') is-invalid @enderror"
                                    placeholder="name@example.com" value="{{ old('email') }}" required />
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label text-secondary fw-semibold small mb-0"
                                    for="pwd">Password</label>
                                @if (Route::has('password.request'))
                                    <a href="#" class="text-decoration-none small text-primary fw-medium">Forgot
                                        password?</a>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                </span>
                                <input type="password" id="pwd" name="password"
                                    class="form-control border-start-0 bg-light @error('password') is-invalid @enderror"
                                    placeholder="Enter your password" required />
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label small text-muted" for="remember">
                                Remember me
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="btn btn-primary w-100 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2">
                            <span>Sign in</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                    </form>


                    @if (Route::has('register'))
                        <p class="text-center text-muted small mt-4 mb-0">
                            Don't have an account?
                            <a href="{{ route('register') }}"
                                class="text-primary text-decoration-none fw-semibold">Register here</a>
                        </p>
                    @endif

                </div>
            </div>
        </div>
    </main>
@endsection
