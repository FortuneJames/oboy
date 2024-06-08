<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;
use App\Models\History;
use App\Models\Investment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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


    // public function invest(Investment $investment)
    // {
    //     $user = Auth::user();

    //     if ($user && $user->role === 'user') {
    //         if ($user->balance >= $investment->min) {
    //             try {
    //                 DB::beginTransaction();

    //                 // Deduct the investment amount from the user's balance
    //                 $investmentAmount = min($user->balance, $investment->min);
    //                 $user->balance -= $investmentAmount;
    //                 $user->save();

    //                 // Calculate the return amount
    //                 $returnAmount = $investmentAmount * (1 + $investment->percentage / 100);

    //                 // Create an investment history record
    //                 DB::table('investment_histories')->insert([
    //                     'user_id' => $user->id,
    //                     'investment_id' => $investment->id,
    //                     'amount' => $investmentAmount,
    //                     'return_amount' => $returnAmount,
    //                     'invested_at' => now(),
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 DB::commit();

    //                 return redirect()->back()->with('success', 'Investment successful.');
    //             } catch (\Exception $e) {
    //                 DB::rollBack();

    //                 return redirect()->back()->with('error', 'An error occurred during the investment.');
    //             }
    //         } else {
    //             return redirect()->back()->with('error', 'Insufficient balance for investment.');
    //         }
    //     }

    //     return redirect()->back()->with('error', 'Unauthorized action.');
    // }
    // public function invest(Investment $investment)
    // {
    //     $user = Auth::user();

    //     if ($user && $user->role === 'user') {
    //         // Validate that the 'min' field is numeric
    //         if (!is_numeric($investment->min)) {
    //             return redirect()->back()->with('error', 'Invalid investment minimum amount.');
    //         }

    //         if ($user->balance >= $investment->min) {
    //             try {
    //                 DB::beginTransaction();

    //                 // Deduct the investment amount from the user's balance
    //                 $investmentAmount = min($user->balance, $investment->min);
    //                 $user->balance -= $investmentAmount;
    //                 $user->save();

    //                 // Validate that the 'percentage' field exists and is numeric
    //                 if (!isset($investment->percentage) || !is_numeric($investment->percentage)) {
    //                     return redirect()->back()->with('error', 'Invalid investment percentage.');
    //                 }

    //                 // Calculate the return amount
    //                 $returnAmount = $investmentAmount * (1 + $investment->percentage / 100);

    //                 // Create an investment history record
    //                 DB::table('investment_histories')->insert([
    //                     'user_id' => $user->id,
    //                     'investment_id' => $investment->id,
    //                     'amount' => $investmentAmount,
    //                     'return_amount' => $returnAmount,
    //                     'invested_at' => now(),
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]);

    //                 DB::commit();

    //                 return redirect()->back()->with('success', 'Investment successful.');
    //             } catch (\Exception $e) {
    //                 DB::rollBack();

    //                 // Log the exception message and stack trace
    //                 Log::error('Investment Error: ' . $e->getMessage(), ['exception' => $e]);

    //                 return redirect()->back()->with('error', 'An error occurred during the investment.');
    //             }
    //         } else {
    //             return redirect()->back()->with('error', 'Insufficient balance for investment.');
    //         }
    //     }

    //     return redirect()->back()->with('error', 'Unauthorized action.');
    // }
    public function invest(Investment $investment)
    {
        $user = Auth::user();

        if (!$this->isAuthorizedUser($user)) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        if (!$this->isValidInvestment($investment)) {
            return redirect()->back()->with('error', 'Invalid investment details.');
        }

        if (!$this->hasSufficientBalance($user, $investment->min)) {
            return redirect()->back()->with('error', 'Insufficient balance for investment.');
        }

        try {
            DB::beginTransaction();

            // Deduct the investment amount from the user's balance
            $investmentAmount = $this->deductBalance($user, $investment->min);

            // Calculate the return amount
            $returnAmount = $this->calculateReturnAmount($investmentAmount, $investment->percentage);

            // Create an investment history record
            $this->createInvestmentHistory($user->id, $investment->id, $investmentAmount, $returnAmount);

            DB::commit();

            return redirect()->back()->with('success', 'Investment successful.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the exception message and stack trace
            Log::error('Investment Error: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->with('error', 'An error occurred during the investment.');
        }
    }

    private function isAuthorizedUser($user)
    {
        return $user && $user->role === 'user';
    }

    private function isValidInvestment($investment)
    {
        return is_numeric($investment->min) && isset($investment->percentage) && is_numeric($investment->percentage);
    }

    private function hasSufficientBalance($user, $minAmount)
    {
        return $user->balance >= $minAmount;
    }

    private function deductBalance($user, $minAmount)
    {
        $investmentAmount = min($user->balance, $minAmount);
        $user->balance -= $investmentAmount;
        $user->save();

        return $investmentAmount;
    }

    private function calculateReturnAmount($investmentAmount, $percentage)
    {
        return $investmentAmount * (1 + $percentage / 100);
    }

    private function createInvestmentHistory($userId, $investmentId, $amount, $returnAmount)
    {
        History::create([
            'user_id' => $userId,
            'investment_id' => $investmentId,
            'amount' => $amount,
            'return_amount' => $returnAmount,
            'invested_at' => now(),
        ]);
    }





    public function history()
    {
        $user = Auth::user();

        if ($user && $user->role === 'user') {
            // Fetch user's investment histories and related investment details
            $histories = $user->histories()
                ->with('investment') // Assuming 'investment' is the relationship name in your History model
                ->orderBy('created_at', 'desc')
                ->get();

            return view('user.history', compact('histories'));
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }



    public function unstake($historyId)
    {
        $user = Auth::user();

        if ($user && $user->role === 'user') {
            // Find the specific investment history entry for the user
            $investmentHistory = History::where('id', $historyId)
                ->where('user_id', $user->id)
                ->where('status', 'active')
                ->first();

            if ($investmentHistory) {
                try {
                    DB::beginTransaction();

                    // Update the investment history status to 'unstaked'
                    $investmentHistory->update([
                        'status' => 'unstaked',
                        'unstaked_at' => now(),
                    ]);

                    // Refund the invested amount back to the user's balance
                    $user->balance += $investmentHistory->amount;
                    $user->save();

                    DB::commit();

                    return redirect()->route('investments.history')->with('success', 'Investment unstaked successfully.');
                } catch (\Exception $e) {
                    DB::rollBack();

                    return redirect()->route('investments.history')->with('error', 'An error occurred during the unstaking.');
                }
            } else {
                return redirect()->route('investments.history')->with('error', 'Invalid or inactive investment.');
            }
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }
}
