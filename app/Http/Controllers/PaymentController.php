<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $payments = Payment::all(); // Admin sees all
        } else {
            $payments = Payment::where('user_id', auth()->id())->get(); // Client sees their own
        }
        return view('payments.index', compact('payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        Payment::create([
            'user_id' => auth()->id(),
            'appointment_id' => $request->appointment_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'paid_at' => now(),
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment processed!');
    }

}
