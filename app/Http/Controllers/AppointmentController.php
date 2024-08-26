<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class AppointmentController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $appointments = Appointment::all(); // Admin sees all
        } else {
            $appointments = Appointment::where('user_id', auth()->id())->get(); // Client sees their own
        }
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $services = Service::all();
        return view('appointments.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_address' => 'required|string|max:255',
            'service_type' => 'required|string',
            'pest_type' => 'required|string',
            'severity' => 'required|string',
        ]);

        Appointment::create([
            'user_id' => auth()->id(),
            'client_name' => $request->client_name,
            'client_address' => $request->client_address,
            'pest_found' => $request->pest_found,
            'action_taken' => $request->action_taken,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
            'remarks' => $request->remarks,
            'chemicals_used' => $request->chemicals_used,
            'pest_control_applicator' => $request->pest_control_applicator,
            'escort_name' => $request->escort_name,
            'chemicals' => json_encode($request->chemicals),
            'service_type' => $request->service_type,
            'pest_type' => $request->pest_type,
            'severity' => $request->severity,
            'description' => $request->description,
            'status' => 'scheduled',
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment created!');
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        if (auth()->user()->role !== 'admin' && $appointment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        if (auth()->user()->role !== 'admin' && $appointment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted!');
    }



}
