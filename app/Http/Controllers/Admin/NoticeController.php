<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NoticeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	 $notice=DB::table('notices')->first();
    	 return view('admin.setting.notice.index',compact('notice'));
    }

    public function update(Request $request)
    {
          $data=array();
          $data['notice_en']=$request->notice_en;
          $data['notice_bn']=$request->notice_bn;
          DB::table('notices')->where('id',$request->id)->update($data);
          $notification=array(
                        'messege'=>'Successfully Update',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
    }

    public function ActiveNotice($id)
    {
    	DB::table('notices')->where('id',$id)->update(['status'=>1]);
    	 $notification=array(
                        'messege'=>'Successfully  notice on your website',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
    }

     public function DeactiveNotice($id)
    {
    		DB::table('notices')->where('id',$id)->update(['status'=>0]);
    	   $notification=array(
                        'messege'=>' notice off  your website',
                        'alert-type'=>'success'
                         );
         return Redirect()->back()->with($notification);
    }
}
