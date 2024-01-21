<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\ClientClass;
use App\Models\Material;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $prices = Price::with('class', 'material')->get();
        return view('pages.price.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = ClientClass::all();
        $materials = Material::all();

        return view('pages.price.create', compact('classes', 'materials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePriceRequest $request)
    {
        //
        Price::create($request->all());

        return redirect()->route('prices.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        //
        $classes = ClientClass::all();
        $materials = Material::all();
        return view('pages.price.edit', compact('price', 'classes', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriceRequest $request, Price $price)
    {
        //

        $price->update($request->all());
        return redirect()->route('prices.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        //
        $price->delete();
        return redirect()->route('prices.index');
    }
}
