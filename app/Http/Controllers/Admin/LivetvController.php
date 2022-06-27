<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivetvController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	 $livetv=DB::table('livetv')->first();
    	 return view('admin.setting.livetv.index',compact('livetv'));
    }

    public function update(Request $request)
    {
          $data=array();
          $data['embed_code']=$request->embed_code;
          DB::table('livetv')->where('id',$request->id)->update($data);
          $notification=array(
                        'messege'=>'Successfully Update',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
    }

    public function ActiveLivetv($id)
    {
    	DB::table('livetv')->where('id',$id)->update(['status'=>1]);
    	 $notification=array(
                        'messege'=>'Successfully  LiveTv on your website',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
    }

     public function DeactiveLivetv($id)
    {
    		DB::table('livetv')->where('id',$id)->update(['status'=>0]);
    	   $notification=array(
                        'messege'=>' LiveTv off  your website',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
    }
}
