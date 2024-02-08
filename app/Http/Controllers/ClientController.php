<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\ClientClass;
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
