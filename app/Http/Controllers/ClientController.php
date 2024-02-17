<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\ClientClass;
use App\Models\ReceiveCash;
use App\Models\ReceiveCashReminder;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::all();

        return view('pages.client.index', compact('clients'));
    }


    public function clientInfo($id)
    {
        //
        $client = Client::with('receiveCashes')->findOrFail($id);

        $receiveCashRemainingAmount = ReceiveCash::where('client_id', $client->id)->sum('remaining_amount');


        return view('pages.client.client_info', compact('client', 'receiveCashRemainingAmount'));
    }

    public function payShow($id)
    {
        //
        $client = Client::findOrFail($id);



        return view('pages.client.client_pay', compact('client'));
    }



    public function payStore(Request $request)
    {
        $request->validate([
            'paid_amount' => 'required|numeric',
            'receive_date' => 'required'
        ]);
        // Find the client with associated receiveCashes
        $client = Client::with('receiveCashes')->findOrFail($request->client_id);

        // Initialize a variable to track the remaining paid amount
        $remainingPaidAmount = $request->paid_amount;

        // Iterate over each receiveCash associated with the client
        foreach ($client->receiveCashes as $receiveCash) {
            // Calculate the remaining amount to be paid
            $remainingAmount = $receiveCash->service_price - $receiveCash->receiveCashReminders()->sum('paid_amount');

            // If there's remaining amount to be paid and remaining paid amount
            if ($remainingAmount > 0 && $remainingPaidAmount > 0) {
                // Calculate the amount to be paid in this iteration
                $amountToPay = min($remainingAmount, $remainingPaidAmount);

                // Ensure remaining amount doesn't go below zero
                $newRemainingAmount = max($receiveCash->remaining_amount - $amountToPay, 0);

                // Calculate the actual amount to be paid considering the remaining amount
                $amountToPay = $receiveCash->remaining_amount - $newRemainingAmount;

                // Update receiveCash remaining amount
                $receiveCash->remaining_amount = $newRemainingAmount;
                $receiveCash->save();

                $lastReceiveCashReminder = ReceiveCashReminder::where('receive_cash_id', $receiveCash->id)->latest()->first();


                if($lastReceiveCashReminder == null  ||  abs($lastReceiveCashReminder->remaining_amount - 0.00) > 0.001) {

                    // Create a new ReceiveCashReminder instance
                    $receiveCashReminder = new ReceiveCashReminder();

                    // Assign receive cash ID to the ReceiveCashReminder
                    $receiveCashReminder->receive_cash_id = $receiveCash->id;

                    // Update the paid amount for this reminder
                    $receiveCashReminder->paid_amount = $amountToPay;

                    $receiveCashReminder->remaining_amount = $receiveCash->remaining_amount;

                    // Set the reminder date to the receive date
                    $receiveCashReminder->receive_cash_reminder_date = $request->receive_date;

                    // Save the ReceiveCashReminder instance
                    $receiveCashReminder->save();
                    // Deduct the paid amount from the remainingPaidAmount
                    $remainingPaidAmount -= $amountToPay;


                }



            }
        }

        // Redirect with success message
        return redirect()->route('clients.index')->with('toast_success', 'تم الدفع بنجاح');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = ClientClass::all();

        return view('pages.client.create', compact('classes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        //
        Client::create($request->all());

        // redirect to receive cash create
        return redirect()->route('receive_cash.create')->with('toast_success', 'تم أنشاء العميل بنجاح');
    }




    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
        $classes = ClientClass::all();

        return view('pages.client.edit', compact('client', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
        $client->update($request->all());

        return redirect()->route('clients.index')->with('toast_success', 'تم تعديل العميل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();

        return redirect()->route('clients.index')->with('toast_success', 'تم حذف العميل بنجاح');
    }

    public function clientsAutocomplete(Request $request)
    {
        $term = $request->input('term');

        $clients = Client::where('name', 'LIKE', '%' . $term . '%')
            ->select('name', 'id') // Select both name and id
            ->get(); // Retrieve the matching customers

        return response()->json($clients);
    }
}
