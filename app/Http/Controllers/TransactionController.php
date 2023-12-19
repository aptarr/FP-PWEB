<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $transactions = $user->transaction()->with('service')->get();
//        dd($transactions);
        return view('my_order', compact('transactions'));

    }

    public function manage()
    {
        $user = Auth::user();
        $transactions = Transaction::whereIn('service_id', function ($query) use ($user) {
            $query->select('id')->from('services')->where('user_id', $user->id);
        })
        ->join('users', 'transactions.user_id', '=', 'users.id') // Assuming 'user_id' is the foreign key in the transactions table
        ->select('transactions.*', 'users.name as user_name') // Select additional columns from the users table
        ->get();

        //dd($transactions);
        return view('manage_order', compact('transactions'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeTransaction($id, $package)
    {
        $user = Auth::user();

        // Your code to perform the transaction goes here
        // Example:
        $user->transaction()->create([
            'quantity' => 1,
            'status' => "pending",
            'package' => $package,
            'deliverable' => "temp",
            'isReview' => 0,
            'user_id' => $user->id,
            'service_id' => $id,
        ]);

        $successMessage = "Order successfully placed";

        return redirect()->route('dashboard')->with('success', $successMessage);
    }

    public function complete(Request $request, $id, $status)
    {
        // Validate the request
        $request->validate([
            'deliverable' => 'required', // Adjust file types and size as needed
        ]);

        // Store the file in the storage/app/public directory
        $path = $request->file('deliverable')->store('public/deliverables');

        // Assuming you have a model associated with the transaction, you can save the file path in the database
        $transaction = Transaction::find($id);
        $transaction->deliverable = $path;
        $transaction->update([
            'status' => $status,
        ]);
        $transaction->save();


        $successMessage = "Deliverable successfully updated";
        return redirect()->route('get.sellorder')->with('success', $successMessage);
        // Add any additional logic or redirect as needed
    }

    public function download($id)
    {
        // Retrieve the file path from the database or wherever you have stored it
        $transaction = Transaction::find($id);

        //dd($transaction);
        if (!$transaction) {
            abort(404); // Or handle the case when the transaction is not found
        }

        $filePath = storage_path("/app/{$transaction->deliverable}");

        // Check if the file exists
        if (!file_exists($filePath)) {
            abort(404); // Or handle the case when the file is not found
        }


        return response()->download($filePath); // Change 'desired_filename.pdf' to the desired file name
    }
    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, $status)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return redirect()->route('get.sellorder')->with('error', 'Transaction not found.');
        }

        $transaction->update([
            'status' => $status,
        ]);

        $successMessage = "Order successfully updated";

        return redirect()->route('get.sellorder')->with('success', $successMessage);
    }

    public function update_my_order($id, $status)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return redirect()->route('get.myorder')->with('error', 'Transaction not found.');
        }

        $transaction->update([
            'status' => $status,
        ]);

        $successMessage = "Order successfully updated";

        return redirect()->route('get.myorder')->with('success', $successMessage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
