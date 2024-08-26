@extends('layouts.app')

@section('title', 'Create Appointment')

@section('content')
    <h1>Create Appointment</h1>

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name</label>
            <input type="text" name="client_name" class="form-control" id="client_name" required>
        </div>

        <div class="mb-3">
            <label for="client_address" class="form-label">Client Address</label>
            <input type="text" name="client_address" class="form-control" id="client_address" required>
        </div>

        <div class="mb-3">
            <label for="service_type" class="form-label">Service Type</label>
            <select name="service_type" id="service_type" class="form-control" required>
                @foreach($services as $service)
                    <option value="{{ $service->name }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pest_type" class="form-label">Pest Type</label>
            <input type="text" name="pest_type" class="form-control" id="pest_type" required>
        </div>

        <div class="mb-3">
            <label for="severity" class="form-label">Severity</label>
            <select name="severity" id="severity" class="form-control" required>
                <option value="Light">Light</option>
                <option value="Moderate">Moderate</option>
                <option value="Severe">Severe</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Appointment</button>
    </form>
@endsection
