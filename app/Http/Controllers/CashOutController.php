<?php

namespace App\Http\Controllers;

use App\Models\CashOut;
use App\Http\Requests\StoreCashOutRequest;
use App\Http\Requests\UpdateCashOutRequest;
use App\Models\Client;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class CashOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cashOut = CashOut::all();
        return view('pages.cash_out.index', compact('cashOut'));
    }

    public function reports()
    {
        //
        $cashOut = CashOut::with('user', 'supplier')->get();
        return view('pages.cash_out.reports', compact('cashOut'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $suppliers = Supplier::all();
        return view('pages.cash_out.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCashOutRequest $request)
    {
        //
        $validatedData = $request->validate([
            'date' => 'required|date',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'paid_amount' => 'required|numeric',
        ]);

        CashOut::create($validatedData);

        return redirect()->route('cash_out.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CashOut $cashOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $cashOut = CashOut::findOrFail($id);
        $suppliers = Supplier::all();
        $users = User::all();
        $clients = Client::all();
        return view(
            'pages.cash_out.edit',
            compact('cashOut', 'suppliers', 'users', 'clients')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'receipt_number' => 'required|string',
            'date' => 'required|date',
            // 'expense' => 'required|in:rent,salary',
            'recipient' => 'required|in:client,service_provider,user',
            'expense_type_id' => 'nullable|exists:expense_types,id',
            // 'service_id' => 'nullable|exists:services,id',
            'service_provider_id' => 'nullable|exists:service_providers,id',
            'client_id' => 'nullable|exists:clients,id',
            'user_id' => 'nullable|exists:users,id',
            'paid_amount' => 'required|numeric',

        ]);

        $cashOut = CashOut::findOrFail($id);
        $cashOut->update($validatedData);

        return redirect()->route('cash_out.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cashOut = CashOut::findOrFail($id);
        $cashOut->delete();

        return redirect()->route('cash_out.index');
    }

    public function pdfReport($id)
    {

        $cashOut = CashOut::findOrFail($id);
        $data = [
            'cashOut' => $cashOut
        ];

        $pdf =  PDF::loadView('pages.cash_out.pdf_report', $data);
        return $pdf->stream('Report.pdf');
    }

    // public function getProvider(Request $request)
    // {


    //     $expense_type_id = $request->expense_type_id;

    //     $service_providers = ServiceProviders::where('expense_type_id', $expense_type_id)->get();

    //     return response()->json(['service_providers' => $service_providers]);

    // }
}
