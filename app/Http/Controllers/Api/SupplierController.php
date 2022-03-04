<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Strong;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers  = Supplier::all();
        return response()->json($suppliers);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:suppliers',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $data = $request->all();
        if($request->hasFile('image')) {
            $image = $request->image->store('uploads/suppliers');

            $data['image'] = $image;
        }

        Supplier::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return response()->json($supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'supplier_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $data = $request->all();
        if($request->hasFile('image')) {
            $image = $request->image->store('uploads/suppliers');

            $data['image'] = $image;

            Storage::delete($supplier->image);
        }

        $supplier->update($data);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        Storage::delete($supplier->image);
    }
}
