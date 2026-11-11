@extends('components.app')

@section('title', 'Update')

@section('content')
    <main class="d-flex align-items-center justify-content-center min-vh-100 bg-light py-5">
        <div class="w-100" style="max-width: 800px;">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-sm-5">

                    <div class="text-center mb-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm"
                            style="width: 52px; height: 52px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="19" y1="11" x2="19" y2="17"></line>
                                <line x1="16" y1="14" x2="22" y2="14"></line>
                            </svg>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">Patient Registration</h3>
                        <p class="text-muted small">Fill in the details to register a new patient</p>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('patient.update', $patient->getPatientName['name_id']) }}" method="POST"
                        id="patientForm" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- SECTION 1: Personal Information -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold text-uppercase fs-7 tracking-wide mb-3 border-bottom pb-2">
                                Personal Details</h6>
                            <div class="row g-3">
                                <!-- Title -->
                                <div class="col-md-3">
                                    <label class="form-label text-secondary fw-semibold small" for="title">Title</label>
                                    <input type="text" id="title" name="title"
                                        class="form-control bg-light @error('title') is-invalid @enderror"
                                        placeholder="e.g. Mr., Ms., Dr." value="{{ $patient->getPatientName['title'] }}" />
                                    @error('title')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- First Name -->
                                <div class="col-md-4">
                                    <label class="form-label text-secondary fw-semibold small" for="first_name">First
                                        Name</label>
                                    <input type="text" id="first_name" name="first_name"
                                        class="form-control bg-light @error('first_name') is-invalid @enderror"
                                        value="{{ $patient->getPatientName['first_name'] }}" />
                                    @error('first_name')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Middle Name -->
                                <div class="col-md-5">
                                    <label class="form-label text-secondary fw-semibold small" for="middle_name">Middle
                                        Name</label>
                                    <input type="text" id="middle_name" name="middle_name"
                                        class="form-control bg-light @error('middle_name') is-invalid @enderror"
                                        value="{{ $patient->getPatientName['middle_name'] }}" />
                                    @error('middle_name')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Last Name -->
                                <div class="col-md-8">
                                    <label class="form-label text-secondary fw-semibold small" for="last_name">Last
                                        Name</label>
                                    <input type="text" id="last_name" name="last_name"
                                        class="form-control bg-light @error('last_name') is-invalid @enderror"
                                        value="{{ $patient->getPatientName['last_name'] }}" />
                                    @error('last_name')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Suffix -->
                                <div class="col-md-4">
                                    <label class="form-label text-secondary fw-semibold small" for="suffix">Suffix</label>
                                    <input type="text" id="suffix" name="suffix"
                                        class="form-control bg-light @error('suffix') is-invalid @enderror"
                                        placeholder="e.g. Jr., III" value="{{ $patient->getPatientName['suffix'] }}" />
                                    @error('suffix')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 2: Demographics -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold text-uppercase fs-7 tracking-wide mb-3 border-bottom pb-2">
                                Demographics</h6>
                            <div class="row g-3">
                                <!-- Gender -->
                                <div class="col-md-6">
                                    <label class="form-label text-secondary fw-semibold small" for="gender">Gender</label>
                                    <select name="gender" id="gender"
                                        class="form-select bg-light @error('gender') is-invalid @enderror">
                                        <option value="{{ $patient->getPatientInfo['gender'] }}">Select
                                            Gender
                                        </option>
                                        <option value="Male">Male
                                        </option>
                                        <option value="Female">Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Date of Birth -->
                                <div class="col-md-6">
                                    <label class="form-label text-secondary fw-semibold small" for="dob">Date of
                                        Birth</label>
                                    <input type="date" id="dob" name="dob"
                                        class="form-control bg-light @error('dob') is-invalid @enderror"
                                        value="{{ $patient->getPatientInfo['dob'] }}" />
                                    @error('dob')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- age -->
                                <div class="col-md-4">
                                    <label class="form-label text-secondary fw-semibold small"
                                        for="occupation">Age</label>
                                    <input type="number" id="age" name="age"
                                        class="form-control bg-light @error('age') is-invalid @enderror"
                                        value="{{ $patient->getPatientInfo['age'] }}" />
                                    @error('age')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Civil Status -->
                                <div class="col-md-4">
                                    <label class="form-label text-secondary fw-semibold small" for="civil_status">Civil
                                        Status</label>
                                    <select name="civil_status" id="civil_status"
                                        class="form-select bg-light @error('civil_status') is-invalid @enderror">
                                        <option value="{{ $patient->getPatientInfo['civil_status'] }}">Select
                                            Civil Status</option>
                                        <option value="Single">
                                            Single</option>
                                        <option value="Married">
                                            Married</option>
                                        <option value="Widowed">
                                            Widowed</option>
                                        <option value="Separated">Separated</option>
                                    </select>
                                    @error('civil_status')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Occupation -->
                                <div class="col-md-4">
                                    <label class="form-label text-secondary fw-semibold small"
                                        for="occupation">Occupation</label>
                                    <input type="text" id="occupation" name="occupation"
                                        class="form-control bg-light @error('occupation') is-invalid @enderror"
                                        value="{{ $patient->getPatientInfo['occupation'] }}" />
                                    @error('occupation')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Education -->
                                <div class="col-md-4">
                                    <label class="form-label text-secondary fw-semibold small"
                                        for="education">Education</label>
                                    <input type="text" id="education" name="education"
                                        class="form-control bg-light @error('education') is-invalid @enderror"
                                        value="{{ $patient->getPatientInfo['education'] }}" />
                                    @error('education')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 3: Contact Details -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold text-uppercase fs-7 tracking-wide mb-3 border-bottom pb-2">
                                Contact Info</h6>
                            <div class="row g-3">
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label text-secondary fw-semibold small" for="email_address">Email
                                        Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0 text-muted">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                                <polyline points="22,6 12,13 2,6" />
                                            </svg>
                                        </span>
                                        <input type="email" id="email_address" name="email_address"
                                            class="form-control border-start-0 bg-light @error('email_address') is-invalid @enderror"
                                            value="{{ $patient->getPatientContact['email_address'] }}" />
                                    </div>
                                    @error('email_address')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Mobile Number -->
                                <div class="col-md-6">
                                    <label class="form-label text-secondary fw-semibold small" for="mobile_number">Mobile
                                        Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0 text-muted">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <path
                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                            </svg>
                                        </span>
                                        <input type="text" id="mobile_number" name="mobile_number"
                                            class="form-control border-start-0 bg-light @error('mobile_number') is-invalid @enderror"
                                            value="{{ $patient->getPatientContact['mobile_number'] }}" />
                                    </div>
                                    @error('mobile_number')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 4: Address / PSGC Information -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold text-uppercase fs-7 tracking-wide mb-3 border-bottom pb-2">
                                Address & Location (PSGC)</h6>
                            <div class="row g-3">
                                <!-- Region PSGC -->
                                <div class="col-md-6">
                                    <label class="form-label text-secondary fw-semibold small" for="psgc_region_id">Region
                                        PSGC ID</label>
                                    <input type="text" id="psgc_region_id" name="psgc_region_id"
                                        class="form-control bg-light @error('psgc_region_id') is-invalid @enderror"
                                        value="{{ $patient->getPatientAddress['psgc_region_id'] }}" />
                                    @error('psgc_region_id')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Province PSGC -->
                                <div class="col-md-6">
                                    <label class="form-label text-secondary fw-semibold small" for="psgc_prov_id">Province
                                        PSGC ID</label>
                                    <input type="text" id="psgc_prov_id" name="psgc_prov_id"
                                        class="form-control bg-light @error('psgc_prov_id') is-invalid @enderror"
                                        value="{{ $patient->getPatientAddress['psgc_prov_id'] }}" />
                                    @error('psgc_prov_id')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- City/Municipality PSGC -->
                                <div class="col-md-6">
                                    <label class="form-label text-secondary fw-semibold small"
                                        for="psgc_city_id">City/Municipality PSGC ID</label>
                                    <input type="text" id="psgc_city_id" name="psgc_city_id"
                                        class="form-control bg-light @error('psgc_city_id') is-invalid @enderror"
                                        value="{{ $patient->getPatientAddress['psgc_city_id'] }}" />
                                    @error('psgc_city_id')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Barangay PSGC -->
                                <div class="col-md-6">
                                    <label class="form-label text-secondary fw-semibold small"
                                        for="psgc_barangay_id">Barangay</label>
                                    <input type="text" id="psgc_barangay_id" name="psgc_barangay_id"
                                        class="form-control bg-light @error('psgc_barangay_id') is-invalid @enderror"
                                        value="{{ $patient->getPatientAddress['psgc_barangay_id'] }}" />
                                    @error('psgc_barangay_id')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Full Address -->
                                <div class="col-12">
                                    <label class="form-label text-secondary fw-semibold small" for="full_address">Full
                                        Address</label>
                                    <textarea name="full_address" id="full_address"
                                        class="form-control bg-light @error('full_address') is-invalid @enderror" rows="3">{{ $patient->getPatientAddress['full_address'] }}</textarea>
                                    @error('full_address')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 5: Status / Class -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold text-uppercase fs-7 tracking-wide mb-3 border-bottom pb-2">
                                Classification</h6>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label text-secondary fw-semibold small" for="patient_class">Patient
                                        Class</label>
                                    <input type="text" id="patient_class" name="patient_class"
                                        class="form-control bg-light @error('patient_class') is-invalid @enderror"
                                        placeholder="e.g. Outpatient, Inpatient"
                                        value="{{ $patient->getPatientStatus['patient_class'] }}" />
                                    @error('patient_class')
                                        <div class="invalid-feedback d-block mt-1 small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="btn btn-primary w-100 py-2.5 fw-semibold d-flex align-items-center justify-content-center gap-2 mt-4">
                            <span>Update</span>
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
