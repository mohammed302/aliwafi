<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Order;
use App\Bank;
use App\Payment;
use App\Product;
use Carbon;

class HomeController extends Controller {

    ////ihome page
    public function index() {


        $data['setting'] = Setting::find(1);

        return view('front.index', $data);
    }

    
    // store order
    public function storeOrder(Request $request) {


        $this->validate($request, [

            'name' => 'required',
            'tel' => 'required',
            'address' => 'required',
         
        ]);




        $order = new Order();
        $order->name = $request->name;
        $order->whatsup = $request->tel;
        $order->address = $request->address;
        $order->date = Carbon\Carbon::now();
        $order->store=$id;
        $order->save();
        $request->session()->flash('alert-success', 'تم بنجاح');


        return $order->id;
    }
    
   

}
