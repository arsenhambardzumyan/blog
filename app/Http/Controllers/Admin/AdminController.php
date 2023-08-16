<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $admins = Admin::orderBy('id','asc')->get();
        return view('admin.admin', compact('admins'));

    }

    public function create(){
        $logedInAdmin = Auth::guard('admin')->user();
        return view('admin.create_admin');


    }

    public function store(Request $request){
        $rules = [
            'email' => 'required|unique:admins',
            'password' => 'required|min:4',
            'status' => 'required',
        ];
        $customMessages = [
            'email.required' => trans('admin_validation.Email is required'),
            'email.unique' => trans('admin_validation.Email already exist'),
            'password.required' => trans('admin_validation.Password is required'),
            'password.min' => trans('admin_validation.Password Must be 4 characters'),
        ];
        $this->validate($request, $rules,$customMessages);

        $admin = new Admin();
        $admin->email =$request->email;
        $admin->status =$request->status;
        $admin->password =Hash::make($request->password);
        $admin->save();

        $notification = trans('admin_validation.Create Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit_admin',compact('admin'));
    }

    public function update(Request $request, $id){

        $admin = Admin::find($id);
        $rules = [
            'email' => 'required|unique:admins,email,'. $admin->id,
            'password' => 'required|min:4',
            'status' => 'required',
        ];
        $customMessages = [
            'email.required' => trans('admin_validation.Email is required'),
            'email.unique' => trans('admin_validation.Email already exist'),
            'password.required' => trans('admin_validation.Password is required'),
            'password.min' => trans('admin_validation.Password Must be 4 characters'),
        ];
        $this->validate($request, $rules,$customMessages);


        $admin->email =$request->email;
        $admin->status =$request->status;
        $admin->password =Hash::make($request->password);
        $admin->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function show($id){
        $admin = Admin::find($id);
        return response()->json(['admin' => $admin], 200);
    }

    public function destroy($id){
        $admin = Admin::find($id);
        $admin->delete();
        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function changeStatus($id){
        $admin = Admin::find($id);
        if($admin->status == 1){
            $admin->status = 0;
            $admin->save();
            $message = trans('admin_validation.Inactive Successfully');
        }else{
            $admin->status = 1;
            $admin->save();
            $message = trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }
}
