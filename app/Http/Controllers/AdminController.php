<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Deposit;
use App\Models\Investment;
use App\Models\Payment;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Toastr;


class AdminController extends Controller
{
    //

    function admin()
    {
        // Retrieve users with the role 'user'
        $users = User::where('role', 'user')->get();

        return view('admin.dashboard', compact('users'));
    }


    function deposit()
    {
        // Get all users with the role 'user' and their deposits
        $usersWithDeposits = User::where('role', 'user')->with('deposits')->get();


        return view('admin.deposit', compact('usersWithDeposits'));

        // return view('admin.deposit', compact('deposits'));
    }


    function withdrawal()
    {
        // Get all users with the role 'user' and their deposits
        $usersWithWithdrawals = User::where('role', 'user')->with('withdrawals')->get();


        return view('admin.withdraw', compact('usersWithWithdrawals'));
    }



    function investment()
    {
        $investments = Investment::all();
        return view('admin.investment', compact('investments'));
    }




    function payment()
    {
        $payments = Payment::all();
        return view('admin.payment', compact('payments'));
    }


    function details($id)
    {
        $user = User::findOrFail($id);

        return view('admin.details', compact('user'));
    }


    function update(Request $request, $id)
    {
        $request->validate([
            'balance' => 'required|numeric',
            'profit' => 'required|numeric',
            'bonus' => 'required|numeric',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'balance' => $request->balance,
            'profit' => $request->profit,
            'bonus' => $request->bonus,
        ]);

        return redirect()->route('admin', $user->id)->with('success', 'User updated successfully.');
    }




    public function updatestatus(Request $request, $id)
    {
        $deposit = Deposit::find($id);
        $deposit->status = $request->input('status');
        $deposit->save();

        // return redirect()->back();
        return redirect()->back();
    }


    public function updatewithdraw(Request $request, $id)
    {
        $withdrawal = Withdrawal::find($id);
        $withdrawal->status = $request->input('status');
        $withdrawal->save();

        // return redirect()->back();
        return redirect()->back();
    }


    public function payments(Request $request)
    {
        // Validate and create new payment
        $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'network' => ['required', 'string'],
            // Add other validation rules for creating fields
        ]);

        Payment::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'network' => $request->input('network'),
            // Add other fields you want to create
        ]);

        return redirect()->back()->with('success', 'New payment created successfully.');
    }



    public function delete($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->back()->with('success', 'Payment deleted successfully.');
    }

    public function investments(Request $request)
    {
        // Validate the form data
        $request->validate([
            'plan' => 'required|string',
            'min' => 'required|string',
            'max' => 'required|string',
            'duration' => 'required|string',
        ]);

        // Extract the user ID from the authenticated user
        $userId = Auth::check() && Auth::user()->role === 'user' ? Auth::user()->id : null;

        // Create a new record in the database
        Investment::create([

            'plan' => $request->input('plan'),
            'min' => $request->input('min'),
            'max' => $request->input('max'),
            'percentage' => $request->input('percentage'),
            'duration' => $request->input('duration'),
        ]);

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Form submitted successfully.');
    }
}
