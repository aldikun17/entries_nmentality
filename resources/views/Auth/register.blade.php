@extends('components.app')

@section('title', 'Register')

@section('content')

    <main class="d-flex align-items-center justify-content-center min-vh-100 bg-light py-5">
        <div class="w-100" style="max-width: 440px;">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-sm-5">

                    <div class="text-center mb-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm"
                            style="width: 52px; height: 52px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Create an account</h3>
                        <p class="text-muted small">Sign up to get started</p>
                    </div>


                    <form action="{{ route('register.store') }}" method="POST" id="registerForm" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-secondary fw-semibold small" for="name">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </span>
                                <input type="text" id="name" name="name"
                                    class="form-control border-start-0 bg-light @error('name') is-invalid @enderror"
                                    placeholder="John Doe" value="{{ old('name') }}" required />
                            </div>
                            @error('name')
                                <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>


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


                        <div class="mb-3">
                            <label class="form-label text-secondary fw-semibold small" for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                </span>
                                <input type="password" id="password" name="password"
                                    class="form-control border-start-0 bg-light @error('password') is-invalid @enderror"
                                    placeholder="Create your password" required />
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="form-label text-secondary fw-semibold small" for="password_confirmation">Confirm
                                Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                    </svg>
                                </span>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control border-start-0 bg-light" placeholder="Confirm your password"
                                    required />
                            </div>
                        </div>


                        <button type="submit"
                            class="btn btn-primary w-100 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2">
                            <span>Register</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                    </form>

                    @if (Route::has('login'))
                        <p class="text-center text-muted small mt-4 mb-0">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-semibold">Sign in
                                here</a>
                        </p>
                    @endif

                </div>
            </div>
        </div>
    </main>
@endsection
