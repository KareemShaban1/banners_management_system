<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Client;
use App\Models\ClientClass;
use App\Models\Material;
use Illuminate\Http\Request;

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

    // public function getPrice(Request $request)
    // {


    //     $clientId = $request->input('client_id');
    //     $height = $request->input('height');
    //     $width = $request->input('width');
    //     $quantity = $request->input('quantity');

    //     // Fetch the client's class ID based on the $clientId
    //     $client = Client::find($clientId);

    //     if (!$client) {
    //         // Handle the case when the client is not found
    //         return response()->json(['error' => 'Client not found'], 404);
    //     }

    //     $classId = $client->class_id;

    //     // Fetch the price based on the client's class ID
    //     $price = Price::where('class_id', $classId)->pluck('price')->first();

    //     $totalPrice = 0;

    //     // Check if both height and width are provided
    //     if ($height && $width) {
    //         $totalPrice = $height * $width * $price;
    //     }

    //     // Check if quantity is provided
    //     if ($quantity) {
    //         // If both height and width are provided, update $totalPrice
    //         if ($height && $width) {
    //             $totalPrice = $totalPrice * $quantity;
    //         } else {
    //             // If only quantity is provided, calculate total price based on quantity
    //             $totalPrice = $quantity * $price;
    //         }
    //     }

    //     return response()->json(['price' => $totalPrice]);
    // }



    // public function getPrice(Request $request)
    // {
    //     $clientId = $request->input('client_id');
    //     $materialId = $request->input('material_id');
    //     $heights = $request->input('heights');
    //     $widths = $request->input('widths');
    //     $quantities = $request->input('quantities');

    //     // Fetch the client's class ID based on the $clientId
    //     $client = Client::find($clientId);

    //     if (!$client) {
    //         // Handle the case when the client is not found
    //         return response()->json(['error' => 'Client not found'], 404);
    //     }

    //     $classId = $client->class_id;

    //     // Fetch the price based on the client's class ID
    //     $price = Price::where('class_id', $classId)->pluck('price')->first();

    //     $totalPrice = 0;

    //     $heights = array_filter($heights, function ($value) {
    //         return $value !== null;
    //     });

    //     $widths = array_filter($widths, function ($value) {
    //         return $value !== null;
    //     });

    //     $quantities = array_filter($quantities, function ($value) {
    //         return $value !== null;
    //     });


    //     // Calculate total price based on provided heights, widths, and quantities
    //     if (!empty($heights) && !empty($widths) && !empty($quantities)) {
    //         for ($i = 0; $i < count($quantities); $i++) {
    //             // return response()->json(['test 1' => [$heights , $widths, $quantities , $price]]);

    //             // Ensure both height and width are provided for calculation
    //             if (isset($heights[$i]) && isset($widths[$i]) && isset($quantities[$i])) {
    //                 $totalPrice += ($heights[$i] * $widths[$i] * $price) * $quantities[$i];
    //             }
    //         }
    //     } elseif (!empty($quantities)) {
    //         // return response()->json(['test 2' => [$heights , $widths, $quantities , $price]]);

    //         // If only quantities are provided, calculate total price based on quantities
    //         foreach ($quantities as $quantity) {
    //             $totalPrice += $quantity * $price;
    //         }
    //     } else {
    //         // Handle the case when no valid data is provided
    //         return response()->json(['error' => 'No valid data provided'], 400);
    //     }

    //     return response()->json(['price' => $totalPrice]);
    // }

    public function getPrice(Request $request)
    {
        $clientId = $request->input('client_id');
        $materialId = $request->input('material_id');
        $height = $request->input('height');
        $width = $request->input('width');
        $quantity = $request->input('quantity');

        // Fetch the client's class ID based on the $clientId
        $client = Client::find($clientId);

        if (!$client) {
            // Handle the case when the client is not found
            return response()->json(['error' => 'Client not found'], 404);
        }

        $classId = $client->class_id;

        // Fetch the price based on the client's class ID
        $price = Price::where('class_id', $classId)->where('material_id', $materialId)->pluck('price')->first();

        // Calculate total price based on provided height, width, and quantity
        $totalPrice = 0;
        if (!empty($height) && !empty($width) && !empty($quantity)) {
            $totalPrice = round(($height * $width * $price) * $quantity);
        } elseif (!empty($quantity)) {
            // If only quantity is provided, calculate total price based on quantity
            $totalPrice = round($quantity * $price);
        } else {
            // Handle the case when no valid data is provided
            return response()->json(['error' => 'No valid data provided'], 400);
        }

        return response()->json(['price' => $totalPrice]);
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

        return redirect()->route('prices.index')->with('toast_success', 'تم حفظ السعر بنجاح');


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
        return redirect()->route('prices.index')->with('toast_success', 'تم تعديل السعر بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        //
        $price->delete();
        return redirect()->route('prices.index')->with('toast_success', 'تم حذف السعر بنجاح');
    }
}