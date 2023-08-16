<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\BannerImage;
use Hash;
use Auth;
use Image;
use Str;
use File;
use Exception;


class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $admin=Auth::guard('admin')->user();
        return view('admin.admin_profile',compact('admin'));
    }

    public function update(Request $request){
        $admin=Auth::guard('admin')->user();
        $rules = [
            'name'=>'required',
            'email'=>'required|unique:admins,email,'.$admin->id,
            'password'=>'confirmed',
        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'email.required' => trans('admin_validation.Email is required'),
            'email.unique' => trans('admin_validation.Email already exist'),
            'password.confirmed' => trans('admin_validation.Confirm password does not match'),
        ];
        $this->validate($request, $rules,$customMessages);

        $this->validate($request, $rules);
        $admin=Auth::guard('admin')->user();


        if($request->password){
            $admin->password=Hash::make($request->password);
        }
        $admin->email=$request->email;
        $admin->save();

        $notification= trans('admin_validation.Update Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.profile')->with($notification);


    }
}
