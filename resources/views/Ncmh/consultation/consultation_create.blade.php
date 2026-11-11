@extends('components.app')

@section('title', 'Create consult')

@section('content')
    <main class="d-flex align-items-center justify-content-center min-vh-100 bg-light py-5">
        <div class="w-100" style="max-width: 800px;">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-sm-5">

                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm"
                            style="width: 52px; height: 52px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Consultation Record</h3>
                        <p class="text-muted small">Enter clinical notes and consultation details</p>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('consultation.store') }}" method="POST" id="consultationForm" novalidate>
                        @csrf

                        <!-- SECTION 1: Consultation Details -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold text-uppercase fs-7 tracking-wide mb-3 border-bottom pb-2">
                                Overview</h6>
                            <div class="row g-3">
                                <!-- Encounter ID -->
                                <input type="text" name="encounter_id" value="{{ $encounter->id }}">

                                <!-- Date Consultation -->
                                <div class="col-md-6">
                                    <label class="form-label text-secondary fw-semibold small"
                                        for="date_consultation">Consultation Date</label>
                                    <input type="date" id="date_consultation" name="date_consultation"
                                        class="form-control bg-light @error('date_consultation') is-invalid @enderror"
                                        value="{{ old('date_consultation') }}" />
                                    @error('date_consultation')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 2: Medical History & Complaints -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold text-uppercase fs-7 tracking-wide mb-3 border-bottom pb-2">
                                Clinical Notes</h6>
                            <div class="row g-3">
                                <!-- Chief Complaint -->
                                <div class="col-12">
                                    <label class="form-label text-secondary fw-semibold small" for="chief_complaint">Chief
                                        Complaint</label>
                                    <textarea name="chief_complaint" id="chief_complaint" maxlength="100"
                                        class="form-control bg-light @error('chief_complaint') is-invalid @enderror" rows="2"
                                        placeholder="Primary reason for visit">{{ old('chief_complaint') }}</textarea>
                                    @error('chief_complaint')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- History of Present Illness -->
                                <div class="col-12">
                                    <label class="form-label text-secondary fw-semibold small" for="history_present">History
                                        of Present Illness</label>
                                    <textarea name="history_present" id="history_present" maxlength="100"
                                        class="form-control bg-light @error('history_present') is-invalid @enderror" rows="2"
                                        placeholder="Details of current illness">{{ old('history_present') }}</textarea>
                                    @error('history_present')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Past Medical History -->
                                <div class="col-12">
                                    <label class="form-label text-secondary fw-semibold small" for="history_past">Past
                                        Medical History</label>
                                    <textarea name="history_past" id="history_past" maxlength="100"
                                        class="form-control bg-light @error('history_past') is-invalid @enderror" rows="2"
                                        placeholder="Previous medical conditions or surgeries">{{ old('history_past') }}</textarea>
                                    @error('history_past')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Family History -->
                                <div class="col-12">
                                    <label class="form-label text-secondary fw-semibold small" for="family_history">Family
                                        History</label>
                                    <textarea name="family_history" id="family_history" maxlength="100"
                                        class="form-control bg-light @error('family_history') is-invalid @enderror" rows="2"
                                        placeholder="Hereditary medical conditions">{{ old('family_history') }}</textarea>
                                    @error('family_history')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Social History -->
                                <div class="col-12">
                                    <label class="form-label text-secondary fw-semibold small" for="social_history">Social
                                        History</label>
                                    <textarea name="social_history" id="social_history" maxlength="100"
                                        class="form-control bg-light @error('social_history') is-invalid @enderror" rows="2"
                                        placeholder="Lifestyle, habits, or environment">{{ old('social_history') }}</textarea>
                                    @error('social_history')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Remarks -->
                                <div class="col-12">
                                    <label class="form-label text-secondary fw-semibold small"
                                        for="remarks">Remarks</label>
                                    <textarea name="remarks" id="remarks" maxlength="100"
                                        class="form-control bg-light @error('remarks') is-invalid @enderror" rows="2"
                                        placeholder="Additional observations or notes">{{ old('remarks') }}</textarea>
                                    @error('remarks')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="btn btn-primary w-100 py-2.5 fw-semibold d-flex align-items-center justify-content-center gap-2 mt-4">
                            <span>Submit Record</span>
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
