@extends('layouts.app')

@section('title', 'Appointments')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Appointments</h1>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Create Appointment</a>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Client Name</th>
            <th>Service Type</th>
            <th>Appointment Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->client_name }}</td>
                <td>{{ $appointment->service_type }}</td>
                <td>{{ $appointment->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
