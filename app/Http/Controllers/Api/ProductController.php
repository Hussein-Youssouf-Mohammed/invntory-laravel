<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::join('categories', 'products.category_id', 'categories.id')
            ->join('suppliers', 'products.supplier_id', 'suppliers.id')
            ->select('categories.name As category_name', 'suppliers.name As supplier_name', 'products.*')
            ->orderBy('created_at', 'DESC')->get();

        return response()->json($products);

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
            'name' => 'required',
            'code' => 'required',
            'image' => 'required',
         
        ]);

        $data = $request->all();

        if($request->hasFile('image')) {
            $image =  $request->image->store('uploads/products');

            $data['image'] = $image;
        }

        Product::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'image' => 'required',
         
        ]);

        $data = $request->all();

        if($request->hasFile('image')) {
            $image =  $request->image->store('uploads/products');
            Storage::delete($product->image);

            $data['image'] = $image;

        }

        $product->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Storage::delete($product->image);


    }

    public function stock (Request $request, $id) {
        $data =$request->only(['quantity']);

        Product::where('id', $id)->update($data);
         
    }
}
