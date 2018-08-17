<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Order;
use App\Area;
use App\City;
use Carbon;

class HomeController extends Controller {

    ////home page
    public function index() {


        $data['setting'] = Setting::find(1);
        $data['areas'] = Area::all();
        $data['cities'] = City::all();
        return view('front.index', $data);
    }

    public function cities(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                        'cities' => City::where('area_id', $id)->get()
            ]);
        }
    }

    // store order
    public function storeOrder(Request $request) {


     $this->validate($request, [

            'name' => 'required',
            'mobile' => 'required|unique:orders',
            'email' => 'required|unique:orders',
            'city' => 'required',
            'area' => 'required',
            'nationality' =>'required',
        ]);




        $order = new Order();
        $order->name = $request->name;
        $order->mobile = $request->mobile;
        $order->email = $request->email;
        $order->date = Carbon\Carbon::now();
        $order->area_id =$request->area;
        $order->city_id =$request->city;
        $order->nationalty =$request->nationality;
        $order->save();
        $request->session()->flash('alert-success', 'تم بنجاح');


        return 'done';
    }

}
