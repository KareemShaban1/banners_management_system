<?php

namespace App\Http\Controllers;

use App\Models\ReceiveCash;
use App\Http\Requests\StoreReceiveCashRequest;
use App\Http\Requests\UpdateReceiveCashRequest;
use App\Models\Client;
use App\Models\Material;
use App\Models\OrderItem;
use App\Models\Supplier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class ReceiveCashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $receiveCash = ReceiveCash::whereDate('receive_date', Carbon::today())->
        with('user', 'client', 'material')->latest()->get();
        return view('pages.receive_cash.index', compact('receiveCash'));
    }

    public function cashReceive()
    {

        $receiveCash = ReceiveCash::whereDate('receive_date', Carbon::today())
        ->where('type', 'cash')->
        with('user', 'client', 'material')->latest()->get();
        return view('pages.receive_cash.cashReceive', compact('receiveCash'));
    }

    public function onlineReceive()
    {

        $receiveCash = ReceiveCash::whereDate('receive_date', Carbon::today())->
        where('type', 'online')->
        with('user', 'client', 'material')->latest()->get();
        return view('pages.receive_cash.onlineReceive', compact('receiveCash'));
    }


    public function reports()
    {
        //
        $receiveCash = ReceiveCash::with('user', 'client', 'material')
        ->latest('created_at') // Order by created_at column in descending order
        ->get();

        return view('pages.receive_cash.reports', compact('receiveCash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $materials = Material::all();
        $clients = Client::all();
        $users = User::all();
        $suppliers = Supplier::all();
        return view('pages.receive_cash.create', compact('materials', 'users', 'clients', 'suppliers'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data

        // Extract data from the request
        $requestData = $request->all();

        // Create a new ReceiveCash instance
        $receiveCash = new ReceiveCash();
        $receiveCash->receive_date = $requestData['receive_date'];
        $receiveCash->finish_date = $requestData['finish_date'];
        $receiveCash->client_id = $requestData['client_id'];
        $receiveCash->service_price = $requestData['service_price'];
        $receiveCash->paid_amount = $requestData['paid_amount'];
        $receiveCash->remaining_amount = $requestData['remaining_amount'];
        $receiveCash->type = $requestData['type'];

        // Handle nullable fields
        $receiveCash->description = $requestData['description'] ?? null;

        // Save the ReceiveCash instance
        $receiveCash->save();

        // Handle related models (material_id, height, width, quantity, price)
        for ($i = 0; $i < count($requestData['material_id']); $i++) {
            $orderItem = new OrderItem();
            $orderItem->material_id = $requestData['material_id'][$i];
            $orderItem->height = $requestData['height'][$i] ?? null;
            $orderItem->width = $requestData['width'][$i] ?? null;
            $orderItem->quantity = $requestData['quantity'][$i];
            $orderItem->price = $requestData['price'][$i];
            // Associate the order item with the receive cash
            $receiveCash->orderItems()->save($orderItem);
        }

        return redirect()->route('receive_cash.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(ReceiveCash $receiveCash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $receiveCash = ReceiveCash::findOrFail($id);
        $materials = Material::all();
        $clients = Client::all();
        $users = User::all();
        $suppliers = Supplier::all();

        return view('pages.receive_cash.edit', compact('receiveCash', 'materials', 'users', 'clients', 'suppliers'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReceiveCashRequest $request, $id)
    {
        //
        $receiveCash = ReceiveCash::findOrFail($id);

        $receiveCash->update($request->all());

        return redirect()->route('receive_cash.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $receiveCash = ReceiveCash::findOrFail($id);
        $receiveCash->delete();
        return redirect()->route('receive_cash.index');

    }

    public function pdfReport($id)
    {

        $receiveCash = ReceiveCash::findOrFail($id);
        $data = [
            'receiveCash' => $receiveCash
        ];

        $pdf =  PDF::loadView('pages.receive_cash.pdf_report', $data);
        return $pdf->stream('Report.pdf');
    }
    // public function test($id)
    // {

    //     $receiveCash = ReceiveCash::findOrFail($id);
    //     // $data = [
    //     //     'receiveCash'=>$receiveCash
    //     // ];
    //     return view('pages.receive_cash.test', compact('receiveCash'));

    //     // $pdf =  PDF::loadView('pages.receive_cash.pdf_report',$data);
    //     // return $pdf->stream('Report.pdf');
    // }

}
