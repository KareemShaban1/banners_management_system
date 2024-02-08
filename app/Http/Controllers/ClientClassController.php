<?php

namespace App\Http\Controllers;

use App\Models\ClientClass;
use App\Http\Requests\StoreClientClassRequest;
use App\Http\Requests\UpdateClientClassRequest;

class ClientClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clientClass = ClientClass::all();
        return view('pages.client_class.index', compact('clientClass'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.client_class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientClassRequest $request)
    {
        //
        ClientClass::create($request->all());

        return redirect()->route('clients_class.index')->with('toast_success', 'تم أنشاء تصنيف العميل بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(ClientClass $clientClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientClass $clientClass)
    {
        //
        return view('pages.client_class.edit', compact('clientClass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientClassRequest $request, ClientClass $clientClass)
    {
        //
        $clientClass->update($request->all());

        return redirect()->route('clients_class.index')->with('toast_success', 'تم تعديل تصنيف العميل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientClass $clientClass)
    {
        //

        $clientClass->delete();

        return redirect()->route('clients_class.index')->with('toast_success', 'تم حذف تصنيف العميل بنجاح');

    }
}
