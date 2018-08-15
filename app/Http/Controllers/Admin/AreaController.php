<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Area;
use App\Setting;
use Auth;
use Image;

class AreaController extends Controller
{
  function __construct() {
        $this->middleware('auth:admin');
    }

    ////index
    public function index() {
        
        $data['color'] = Setting::find(1);

        $data['areas'] = Area::orderby('id', 'desc')->get();


        return view('admin.area.areas', $data);
    }

    ////add area
    public function create() {

        $data['color'] = Setting::find(1);
        return view('admin.area.addArea', $data);
    }

    public function store(Request $request) {


      $request->validate([

            'name' => 'required',

        
        ]);




        $area = new Area();
        $area->name = $request->name;


        $area->save();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////update  area
    public function edit($id) {
        $data['area'] = Area::findorfail($id);
        $data['color'] = Setting::find(1);
        return view('admin.area.updateArea', $data);
    }

    public function update(Request $request, $id) {


        $request->validate( [
         
            'name' => 'required',

          
        ]);



        $area = Area::findorfail($id);
        $area->name = $request->name;
        $area->update();




        $request->session()->flash('alert-success', 'تم بنجاح');


        return redirect()->back();
    }

    ////delete  area
    public function destroy(Request $request, $id) {

        $area =Area::findorfail($id);
        $area->delete();
    }

}
