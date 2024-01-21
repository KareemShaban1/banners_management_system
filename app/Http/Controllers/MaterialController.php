<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $materials = Material::all();
        return view('pages.material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.material.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialRequest $request)
    {
        //
        Material::create($request->all());

        return redirect()->route('materials.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        //
        return view('pages.material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaterialRequest $request, Material $material)
    {
        //
        $material->update($request->all());
        return redirect()->route('materials.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        //
        $material->delete();
        return redirect()->route('materials.index');
    }
}