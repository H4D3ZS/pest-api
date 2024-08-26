@extends('layouts.app')

@section('title', 'View Appointment')

@section('content')
    <h1>Appointment Details</h1>

    <div class="mb-3">
        <strong>Client Name:</strong> {{ $appointment->client_name }}
    </div>

    <div class="mb-3">
        <strong>Client Address:</strong> {{ $appointment->client_address }}
    </div>

    <div class="mb-3">
        <strong>Service Type:</strong> {{ $appointment->service_type }}
    </div>

    <div class="mb-3">
        <strong>Pest Type:</strong> {{ $appointment->pest_type }}
    </div>

    <div class="mb-3">
        <strong>Severity:</strong> {{ $appointment->severity }}
    </div>

    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back to Appointments</a>
@endsection
