<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Pos;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request, $id) {

        $product  = Product::where('id', $id)->first();

        $check = Pos::where('pro_id', $id)->first();
        if($check) {
           Pos::where('pro_id', $id)->increment('quantity');
           $product = Pos::where('id', $id)->first();
           $subtotal = $product->quantity * $product->price;
            Pos::where('id', $id)->update(['sub_total' => $subtotal]);
        } else {
       
            $data = $request->only(['pro_id', 'pro_name', 'price', 'quantity', 'sub_total']);          
            $data['pro_id'] = $id;
            $data['pro_name'] = $product->name;
            $data['quantity'] = 1;
            $data['price'] = $product->seller_price;
            $data['sub_total'] = $product->seller_price;
            Pos::create($data);
        }
    }

    public function cart() {
        $carts = Pos::get();

        return response()->json($carts);
    }

    public function removeCart(Pos $pos) {
        $pos->delete();

    }

    public function increment($id) {
       $quantity =  Pos::where('id', $id)->increment('quantity');
       $product = Pos::where('id', $id)->first();
       $subtotal = $product->quantity * $product->price;
       Pos::where('id', $id)->update(['sub_total' => $subtotal]);
       return response()->json('done.');
    }

    public function decrement($id) {
        $quantity =  Pos::where('id', $id)->decrement('quantity');
 
        $product = Pos::where('id', $id)->first();
 
        $subtotal = $product->quantity * $product->price;
        Pos::where('id', $id)->update(['sub_total' => $subtotal]);
        return response()->json('done.');
     }
}
