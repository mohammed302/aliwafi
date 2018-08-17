<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Setting;
use App\Admin;
use App\Order;
use App\City;
use App\Area;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    function __construct()
    {
        $this->middleware('auth:admin');
    }

    function logout(Request $request)
    {

        auth('admin')->logout();

        return redirect('/admin-cpx');
    }

    function index()
    {

        $data['admins'] = Admin::count();
        $data['orders'] = Order::count();
        $data['areas'] = Area::count();
        $data['cities'] =  City::count();
        $data['color'] = Setting::find(1);
        return view('admin.home', $data);
    }

    function setting()
    {
        $data['setting'] = Setting::find(1);
        $data['color'] = Setting::find(1);
        return view('admin.updateSetting', $data);
    }
   function updateSetting(Request $request)
    {
        $this->validate($request, ['name' => 'required',
            'msg' => 'required','home_text'=>'required',
            'color' => 'required',]);
          if ($request->imgPath != null) {
            $image = $request->file('imgPath');

            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = base_path() . '/img/thumbnail';

            $img = Image::make($image->getRealPath(), array(
                        'width' => 300,
                        'height' => 300,
                            //  'grayscale' => false
            ));
            // $img->crop(new Point(0, 0), new Box(45, 45));
            $img->save($destinationPath . '/' . $input['imagename']);

            $destinationPath = base_path() . '/img/';

            $image->move($destinationPath, $input['imagename']);
        }
        $setting = Setting::find(1);
        $setting->name = $request->name;
        $setting->color = $request->color;
        $setting->msg = $request->msg;
        $setting->home_text = $request->home_text;
          if ($request->imgPath != null) {
          $setting->img = $input['imagename'];
        }
        $setting->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }


    function changePassword()
    {
        $data['color'] = Setting::find(1);
        return view('admin.changePassword', $data);
    }

    function changePass(Request $r)
    {
        $this->validate($r, [
            'pass' => 'required|max:204',
        ]);
        $u = Admin::find(Auth::user()->id);
        $u->password = bcrypt($r->pass);
        $u->pass = $r->pass;
        $u->update();
        $r->session()->flash('alert-success', 'تم  بنجاح');
        return redirect()->back();
    }

////////////////////////////////////////////
    function admins()
    {
        $data['admins'] = Admin::all();
        $data['color'] = Setting::find(1);
        return view('admin.adminUsers.admins', $data);
    }

    function addAdmin()
    {
        $data['color'] = Setting::find(1);
        return view('admin.adminUsers.addAdmin', $data);
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:204|unique:admins',
            'password' => 'required|min:6|',
            'email' => 'required|min:6|unique:admins',
        ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->pass = $request->password;
        $admin->save();
        $request->session()->flash('alert-success', 'تمت الاضافة بنجاح');
        return redirect()->back();
    }

    function editAdmin( $admin)
    {
        $data['admin'] = Admin::findorfail($admin);
        $data['color'] = Setting::find(1);
        return view('admin.adminUsers.updateAdmin', $data);
    }

    function update(Request $request,  $admin)
    {
        $this->validate($request, [
            'name' => 'required|max:204|unique:admins,name,' . $admin,
            'password' => 'required|min:6|',
            'email' => 'required|min:6|unique:admins,email,' . $admin,
        ]);
        $admin = Admin::findorfail($admin);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->pass = $request->password;
        $admin->update();
        $request->session()->flash('alert-success', 'تم بنجاح');
        return redirect()->back();
    }

    function destroy(Request $request, Admin $admin)
    {

        if ($admin->delete()) {
            return "delete success";
        } else {
            return "delete failed";
        }
    }


}
