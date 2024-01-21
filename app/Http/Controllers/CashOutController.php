<?php

namespace App\Http\Controllers;

use App\Models\CashOut;
use App\Http\Requests\StoreCashOutRequest;
use App\Http\Requests\UpdateCashOutRequest;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.cash_out.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCashOutRequest $request)
    {
        //
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
    public function edit(CashOut $cashOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCashOutRequest $request, CashOut $cashOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CashOut $cashOut)
    {
        //
    }
}
