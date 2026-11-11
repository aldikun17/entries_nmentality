@extends('components.app')

@section('title', 'encounter')

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
                        <h3 class="fw-bold text-dark mb-1">Creating Encounter</h3>
                    </div>


                    <form action="{{ route('encounter.store') }}" method="POST" novalidate>

                        <input type="text" name="patient_id" value="{{ $patient->name_id }}" hidden>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-secondary fw-semibold small" for="name">Encounter Date</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </span>
                                <input type="date" id="encounter_date" name="encounter_date"
                                    class="form-control border-start-0 bg-light @error('encounter_date') is-invalid @enderror"
                                    placeholder="10/11/2026" value="{{ old('encounter_date') }}" required />
                            </div>
                            @error('encounter_date')
                                <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label text-secondary fw-semibold small" for="email">Encounter Type</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                        <polyline points="22,6 12,13 2,6" />
                                    </svg>
                                </span>
                                <input type="text" id="encounter_type" name="encounter_type"
                                    class="form-control border-start-0 bg-light @error('encounter_type') is-invalid @enderror"
                                    placeholder="encounter" value="{{ old('encounter_type') }}" required />
                            </div>
                            @error('encounter_type')
                                <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label text-secondary fw-semibold small" for="password">Service Type</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                </span>
                                <input type="text" id="service_type" name="service_type"
                                    class="form-control border-start-0 bg-light @error('service_type') is-invalid @enderror"
                                    placeholder="service" required />
                            </div>
                            @error('service_type')
                                <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>


                        <button type="submit"
                            class="btn btn-primary w-100 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2">
                            <span>Create Encounter</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </main>
@endsection
