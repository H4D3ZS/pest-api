<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $userCount = User::count();
        $appointmentCount = Appointment::count();
        $paymentTotal = Payment::sum('amount');

        $latestUsers = User::latest()->take(5)->get();
        $latestAppointments = Appointment::latest()->take(5)->get();
        $latestPayments = Payment::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'userCount',
            'appointmentCount',
            'paymentTotal',
            'latestUsers',
            'latestAppointments',
            'latestPayments'
        ));
    }

    /**
     * Display a list of all users.
     */
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the details of a specific user.
     */
    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Display a list of all appointments.
     */
    public function appointments()
    {
        $appointments = Appointment::with('user')->get();
        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the details of a specific appointment.
     */
    public function showAppointment($id)
    {
        $appointment = Appointment::with('user')->findOrFail($id);
        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Display a list of all payments.
     */
    public function payments()
    {
        $payments = Payment::with('user')->get();
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the details of a specific payment.
     */
    public function showPayment($id)
    {
        $payment = Payment::with('user', 'appointment')->findOrFail($id);
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Delete a specific user.
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    /**
     * Delete a specific appointment.
     */
    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointments')->with('success', 'Appointment deleted successfully.');
    }

    /**
     * Delete a specific payment.
     */
    public function deletePayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.payments')->with('success', 'Payment deleted successfully.');
    }
}
