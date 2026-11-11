@extends('components.app')

@section('title', 'Show data')
@section('content')


    <main class="py-5 bg-light min-vh-100">
        <div class="container-lg">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <!-- Header -->
                <div
                    class="card-header bg-white p-4 border-bottom d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3">
                    <div>
                        <h4 class="mb-1 text-dark fw-bold">Patient Directory</h4>
                        <p class="text-muted mb-0 small">Manage and view registered patient records</p>
                    </div>

                    <div class="d-flex justify-content-end  mb-3">
                        <a href="{{ route('encounter', $patient->name_id) }}"
                            class="btn btn-primary rounded-3 px-4 py-2 fw-semibold shadow-sm" aria-label="Create Encounter">
                            + Create Encounter
                        </a>
                    </div>

                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover">
                        <thead class="bg-light border-bottom">
                            <tr class="text-secondary small fw-semibold text-uppercase fs-7">
                                <th scope="col" class="text-center py-3" style="width: 70px;">ID</th>
                                <th scope="col" class="py-3">Patient Details</th>
                                <th scope="col" class="py-3">Contact</th>
                                <th scope="col" class="py-3">Address</th>
                                <th scope="col" class="py-3">Status</th>
                                <th scope="col" class="text-end py-3 pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (
                                $patient->getPatientName['name_id'] ||
                                    $patient->getPatientInfo['info_id'] ||
                                    $patient->getPatientAddress['address_id'] ||
                                    $patient->getPatientContact['contact_id'] ||
                                    $patient->getPatientStatus['status_id']
                            )
                                <tr>
                                    <!-- ID -->
                                    <td class="text-center fw-bold text-muted small">
                                        #{{ $patient->getPatientName['name_id'] }}
                                    </td>

                                    <!-- Patient Details -->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!-- Dynamic Initials Avatar -->
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold me-3 flex-shrink-0"
                                                style="width: 40px; height: 40px; font-size: 0.85rem;">
                                                {{ strtoupper(substr($patient->first_name ?? 'P', 0, 1) . substr($patient->getPatientName['last_name'] ?? 'D', 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-semibold text-dark text-capitalize">
                                                    {{ $patient->getPatientName['last_name'] }},
                                                    {{ $patient->getPatientName['first_name'] }}</div>
                                                @if (!empty($patient->email_address))
                                                    <div class="text-muted small">
                                                        {{ $patient->getPatientContact['email_address'] }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Contact -->
                                    <td>
                                        <div class="d-flex align-items-center text-secondary small">
                                            <svg class="me-2 text-muted flex-shrink-0" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path
                                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                            </svg>
                                            <span>{{ $patient->getPatientContact['mobile_number'] ?: 'N/A' }}</span>
                                        </div>
                                    </td>

                                    <!-- Address -->
                                    <td>
                                        <div class="d-flex align-items-center text-secondary small text-truncate"
                                            style="max-width: 240px;"
                                            title="{{ $patient->getPatientAddress['full_address'] }}">
                                            <svg class="me-2 text-muted flex-shrink-0" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                            <span
                                                class="text-truncate">{{ $patient->getPatientAddress['full_address'] ?: 'N/A' }}</span>
                                        </div>
                                    </td>

                                    <!-- Status / Patient Class -->
                                    <td>
                                        <span
                                            class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 fw-medium small">
                                            ● {{ $patient->getPatientStatus['patient_class'] ?: 'Standard' }}
                                        </span>
                                    </td>

                                    <td class="text-end pe-4">
                                        <div class="d-inline-flex gap-1">
                                            <!-- Edit -->
                                            <a href="{{ route('patient.edit', $patient->getPatientName['name_id']) }}"
                                                class="btn btn-sm btn-light border text-primary p-1.5 d-inline-flex align-items-center justify-content-center rounded-2"
                                                title="Edit Record" style="width: 32px; height: 32px;">
                                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <!-- Delete -->
                                            <form
                                                action="{{ route('patient.delete', $patient->getPatientName['name_id']) }}"
                                                class="d-inline-block" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this patient record?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-light border text-danger p-1.5 d-inline-flex align-items-center justify-content-center rounded-2"
                                                    title="Delete Record" style="width: 32px; height: 32px;">
                                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <div class="mb-2">
                                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.5" class="text-secondary opacity-50">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <line x1="23" y1="11" x2="17" y2="11">
                                                </line>
                                            </svg>
                                        </div>
                                        <p class="mb-0 fw-medium">No patient records found.</p>
                                    </td>
                                </tr>
                        </tbody>
                        @endif
                    </table>
                </div>


            </div>
        </div>
    </main>

@endsection
