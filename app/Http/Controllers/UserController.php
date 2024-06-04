<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;
use App\Models\Investment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    //



    function dashboard()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect()->route('admin');
        } else {
            return view('user.dashboard', ['user' => $user]);
        }
    }

    public function deposit()
    {
        $user = Auth::user();
        $deposits = $user->deposits;

        // Fetch investments from the database
        $payments = Payment::all();

        return view('user.deposit', [
            'deposits' => $deposits,
            'payments' => $payments, // Pass investments to the view
        ]);
    }


    public function deposits(Request $request)
    {
        // Store a new deposit for the authenticated user
        $user = Auth::user();

        // Validate the request data
        $data = $request->validate([
            'amount' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
            $data['image'] = $image;
        }

        // Create a new deposit for the user
        $deposit = $user->deposits()->create($data);

        // Show Toastr notification
        Toastr::success('Deposit Pending.', 'Success');

        return redirect()->route('user.deposit');
    }


    function withdraw()
    {
        $user = Auth::user();
        $withdrawals = $user->withdrawals;

        return view('user.withdraw', ['withdrawals' => $withdrawals]);
    }

    public function withdraws(Request $request)
    {
        // Store a new withdrawal for the authenticated user
        $user = Auth::user();

        // Validate the request data
        $data = $request->validate([
            'amount' => 'required|numeric',
            'name' => 'required|string',
            'address' => 'required|string',
            'network' => 'required|string',
        ]);

        // Check if the withdrawal amount is greater than the user's balance
        if ($data['amount'] <= $user->balance) {
            // Withdrawal is possible, process it
            $withdrawal = $user->withdrawals()->create($data);

            // Subtract the withdrawal amount from the user's balance
            $user->balance -= $data['amount'];
            $user->save();

            // Show success notification for successful withdrawal
            Toastr::success('Withdrawal successfully.', 'Success');
        } else {
            // Show error notification for insufficient balance
            Toastr::error('Insufficient balance.', 'Error');
        }

        return redirect()->route('user.withdraw');
    }


    function investment()
    {
        $investments = Investment::all();
        return view('user.investment', compact('investments'));
    }



    function deposithistory()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve only the user's deposit transactions
        $deposits = $user->deposits;

        return view('user.deposithistory', compact('deposits'));
    }




    function withdrawalhistory()
    {

        // Get the authenticated user
        $user = Auth::user();

        // Retrieve only the user's deposit transactions
        $withdrawals = $user->withdrawals;


        return view('user.withdrawhistory', compact('withdrawals'));
    }


    public function invest(Investment $investment)
    {
        $user = Auth::user();

        // Check if the user is logged in and has the role of 'user'
        if ($user && $user->role === 'user') {
            // Check if the user's balance is sufficient for the investment
            if ($user->balance >= $investment->min) {
                try {
                    // Start a database transaction
                    DB::beginTransaction();

                    // Deduct the minimum of the investment amount from the user's balance
                    $user->balance -= min($user->balance, $investment->min);
                    $user->save();

                    // Perform additional logic for tracking the investment, updating the database, etc.

                    // Commit the transaction if everything is successful
                    DB::commit();

                    return redirect()->back()->with('success', 'Investment successful.');
                } catch (\Exception $e) {
                    // Rollback the transaction if an exception occurs
                    DB::rollBack();

                    // Log the exception or handle it appropriately
                    return redirect()->back()->with('error', 'An error occurred during the investment.');
                }
            } else {
                return redirect()->back()->with('error', 'Insufficient balance for investment.');
            }
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }
}
