<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Area;
use App\Setting;


class CityController extends Controller
{
  function __construct() {
        $this->middleware('auth:admin');
    }

    ////index
    public function index() {
        
        $data['color'] = Setting::find(1);

        $data['cities'] = City::orderby('id', 'desc')->get();


        return view('admin.city.cities', $data);
    }

    ////add city
    public function create() {

        $data['color'] = Setting::find(1);
        $data['areas'] = Area::all();
        return view('admin.city.addCity', $data);
    }

    public function store(Request $request) {


        $this->validate($request, [

            'name' => 'required|unique:cities',
            'area' => 'required',
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->area_id=$request->area;
        $city->save();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  city
    public function edit($id) {
        $data['city'] = City::findorfail($id);
        $data['color'] = Setting::find(1);
        $data['areas'] = Area::all();
        return view('admin.city.updateCity', $data);
    }

    public function update(Request $request, $id) {


        $this->validate($request, [
         
            'name' => 'required|unique:cities,name,' . $id,
            'area' => 'required',
          
        ]);



        $city = City::findorfail($id);
        $city->name = $request->name;
        $city->area_id=$request->area;
        $city->update();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete  city
    public function destroy(Request $request, $id) {

        $city =City::findorfail($id);
        $city->delete();
    }

}
