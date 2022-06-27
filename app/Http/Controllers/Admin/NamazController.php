<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NamazController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	 $namaz=DB::table('namaz')->first();
    	 return view('admin.setting.namaz.index',compact('namaz'));
    }

    public function update(Request $request)
    {
    	 $data=array();
          $data['fajr']=$request->fajr;
          $data['johr']=$request->johr;
          $data['asor']=$request->asor;
          $data['magrib']=$request->magrib;
          $data['esha']=$request->esha;
          $data['jummah']=$request->jummah;
          $data['sunset']=$request->sunset;
          $data['sunrise']=$request->sunrise;

          DB::table('namaz')->where('id',$request->id)->update($data);

             $notification=array(
                        'messege'=>'Successfully Update',
                        'alert-type'=>'success'
                         );
            return Redirect()->back()->with($notification);
    }
}
