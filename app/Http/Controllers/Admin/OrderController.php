<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Setting;
use App\Admin;
use App\Offer;
use App\Order;
use App\State;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon;

class OrderController extends Controller {

    function __construct() {
        $this->middleware('auth:admin');
    }

    /// Orders
    function orders() {

        $data['orders'] = Order::orderby('id', 'desc')->get();
        $data['color'] = Setting::find(1);
        return view('admin.order.orders', $data);
    }

  

   
    // destroy order
    function destroyOrder(Request $request, $order) {
        $or = Order::findorfail($order);
        $or->delete();
    }

    // destroy all orders
    function destroyOrders(Request $requestr) {
        Order::truncate();
    }
 /// Orders reports
    function reports() {

        $data['orders'] = Order::orderby('id', 'desc')->get();
        $data['color'] = Setting::find(1);
        return view('admin.order.reports', $data);
    }
}
