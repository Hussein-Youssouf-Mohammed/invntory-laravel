<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use App\Order_details;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class OrderController extends Controller
{
    public function getOrder() {
        $data  = date('d/m/Y');

        $order = Order::join('customers', 'orders.customer_id', 'customers.id')->where('order_date', $data)->select('customers.name as name', 'orders.*')
                 ->orderBy('orders.id', 'DESC')->get();

                 return response()->json($order);
    }

    public function details($id) {
       
        // return response()->json($id);

        $order = Order::join('customers', 'orders.customer_id', 'customers.id')
                     ->where('orders.id', $id)
                     ->select('customers.name', 'customers.address', 'customers.phone', 'orders.*')
                     ->orderBy('created_at', 'DESC')->first();

                     return response()->json($order);

    }

    public function detailsAll($id) {
        $details  = Order_details::join('products', 'order_details.pro_id', 'products.id')
                      ->where('order_details.order_id', $id)
                      ->select('products.name', 'products.code', 'products.image', 'order_details.*')
                      ->get();
                   return response()->json($details);
    }


    public function search(Request $request) {

        $data = $request->date;
        $newDate = new DateTime($data);
        $done = $newDate->format("d/m/Y");

        $order = Order::join('customers', 'orders.customer_id', 'customers.id')
                 ->where('orders.order_date', $done)
                 ->select('customers.name', 'orders.*')
                 ->get();

                 return response()->json($order);
                 
    }
}
