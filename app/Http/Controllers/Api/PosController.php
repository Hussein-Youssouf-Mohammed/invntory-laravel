<?php

namespace App\Http\Controllers\Api;

use App\Expense;
use App\Http\Controllers\Controller;
use App\Order;
use App\Order_details;
use App\Pos;
use App\Product;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function getProduct($id) {
        $getproducts  =  Product::where('category_id', $id)->get();

        return response()->json($getproducts);
    }

    public function order(Request $request) {
        $request->validate([
            'customer_id' => 'required',
            'payby' => 'required',
        ]);

        $data= $request->all(['order_month', 'order_date', 'order_year', 'qty', 'vat', 'pay', 'payby', 'sub_total', 'customer_id']);

        $data['order_date'] = date("d/m/Y");
        $data['order_month'] = date("F");
        $data['order_year'] = date("Y");
        $data['sub_total'] = $request->subtotal;
        $data['vat'] = 10;

        $orderId = Order::insertGetId($data);

        $poses = Pos::get();

        $odata = $request->only(['pro_id', 'order_id', 'qty', 'sub_total', 'price']);
        foreach ($poses as $pos) {
            $odata['order_id'] = $orderId;
            $odata['pro_id'] = $pos->pro_id;
            $odata['qty'] = $pos->quantity;
            $odata['sub_total'] = $pos->sub_total;
            $odata['price'] = $pos->price;
            Order_details::create($odata);

            Product::where('id', $pos->pro_id)
            ->update(['quantity' => DB::raw('quantity -' . $pos->quantity)]);
        }
        DB::table('pos')->delete();
        return response()->json('Order done.');

    }
    
    public function Sell() {
       
        $date  = date('d/m/Y');
        $sell = Order::where('order_date', $date)->sum('sub_total');
        return response()->json($sell);

    }
     
    public function Icom() {
       
        $date  = date('d/m/Y');
        $pay = Order::where('order_date', $date)->sum('pay');
        return response()->json($pay);

    }

 public function   exp() {
        $date = date('d/m/y');

        $exp  = Expense::where('expense_date', $date)->sum('amount');
        return response()->json($exp);
    }

    public function stock() {
        $product  = Product::where('quantity', '<', '1')->get();

        return response()->json($product);
    }
}
