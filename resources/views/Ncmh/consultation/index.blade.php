@extends('components.app')

@section('title', 'Consultation')

@section('content')
    @auth
        @include('components.Search.search', [
            'route' => route('consultation.index'),
        ])

    @endauth
    <div class="container-fluid max-width-lg">
        <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">

            <!-- Top Header Row -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold m-0 text-dark">Consulted Patient</h5>
                <span
                    class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-1 fw-normal"
                    style="font-size: 0.75rem;">Selected</span>
            </div>

            @forelse($consultations as $consult)
                <!-- Avatar & Name Row -->
                <div class="d-flex align-items-center mb-4">
                    <!-- Circle Avatar -->
                    <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center me-3"
                        style="width: 48px; height: 48px; min-width: 48px;">
                        {{ strtoupper(substr($consult->first_name ?? 'P', 0, 1) . substr($consult->last_name ?? 'D', 0, 1)) }}
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">
                            {{ $consult->last_name . ' ' . $consult->first_name ?? 'Patient name not found' }}
                        </h6>
                        <small class="text-secondary" style="font-size: 0.8rem;">Patient ID:
                            {{ $consult->name_id ?? 'Patient Id not found' }}</small>
                    </div>
                </div>

                <!-- Data Cards Row -->
                <div class="row g-3 mb-4">
                    <!-- Age Column -->
                    <div class="col-md-4">
                        <div class="bg-body-tertiary p-3 rounded-3 h-100">
                            <div class="text-secondary small mb-1" style="font-size: 0.75rem;">Age</div>
                            <div class="fw-bold text-dark">
                                {{ $consult->age }} years old
                            </div>
                        </div>
                    </div>


                    <!-- gender Column -->
                    <div class="col-md-4">
                        <div class="bg-body-tertiary p-3 rounded-3 h-100">
                            <div class="text-secondary small mb-1" style="font-size: 0.75rem;">Gender</div>
                            <div class="fw-bold text-dark">
                                {{ $consult->gender }}
                            </div>
                        </div>
                    </div>



                    <!-- date of consult Column -->
                    <div class="col-md-4">
                        <div class="bg-body-tertiary p-3 rounded-3 h-100">
                            <div class="text-secondary small mb-1" style="font-size: 0.75rem;">Date Of Consultation
                            </div>
                            <div class="fw-bold text-dark">
                                {{ date('m/d/Y', strtotime($consult->date_consultation)) }}
                            </div>
                        </div>
                    </div>

                    <!-- history past Column -->
                    <div class="col-md-4">
                        <div class="bg-body-tertiary p-3 rounded-3 h-100">
                            <div class="text-secondary small mb-1" style="font-size: 0.75rem;">History past</div>
                            <div class="fw-bold text-dark">
                                {{ $consult->history_past }}
                            </div>
                        </div>
                    </div>

                    <!-- encounter date Column -->
                    <div class="col-md-4">
                        <div class="bg-body-tertiary p-3 rounded-3 h-100">
                            <div class="text-secondary small mb-1" style="font-size: 0.75rem;">Encounter Date</div>
                            <div class="fw-bold text-dark">
                                {{ date('m/d/Y', strtotime($consult->encounter_date)) }}
                            </div>
                        </div>
                    </div>
                    <!-- remarks Column -->
                    <div class="col-md-4">
                        <div class="bg-body-tertiary p-3 rounded-3 h-100">
                            <div class="text-secondary small mb-1" style="font-size: 0.75rem;">Remarks</div>
                            <div class="fw-bold text-dark">
                                {{ $consult->remarks }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Button Row -->
                <div class="d-flex justify-content-end  mb-3">
                    <button type="button" class="btn btn-primary rounded-3 px-4 py-2 fw-semibold shadow-sm">
                        Continue
                    </button>
                </div>
                <div class="card-footer bg-white border-top p-3 d-flex justify-content-end">
                    {{ $consultations->appends(['search' => request()->query('search')])->links() }}
                </div>
            @empty
                <div class="d-flex justify-content-center mb-2">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" class="text-secondary opacity-50">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <line x1="23" y1="11" x2="17" y2="11">
                        </line>
                    </svg>
                </div>
                <p class=" d-flex justify-content-center mb-0 fw-medium">No consulted patient records found.
                </p>

        </div>
        @endforelse
    </div>
@endsection
