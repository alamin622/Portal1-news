<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $setting=DB::table('settings')->first();
       return view('admin.setting.setting.index',compact('setting'));
    }

    public function update(Request $request,$id)
    {
           $data=array();
           $data['name']=$request->name;
           $data['phone_bn']=$request->phone_bn;
           $data['phone_en']=$request->phone_en;
           $data['email']=$request->email;
           $data['address_bn']=$request->address_bn;
           $data['address_en']=$request->address_en;

           if ($request->logo) {
            if (File::exists($request->old_logo)) {
                   unlink($request->old_logo);
              }
            $photo=$request->logo;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            //Image::make($photo)->resize(240,120)->save('public/files/photo/'.$photoname);
            $photo->move('public/files/photo/',$photoname);
            $data['logo']='public/files/photo/'.$photoname;
            DB::table('settings')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'photo updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
      }else{
        $data['logo']=$request->old_logo;
        DB::table('settings')->where('id',$request->id)->update($data);
        $notification=array('messege' => 'photo updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
        }
    }
}
