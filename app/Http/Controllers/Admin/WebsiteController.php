<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	 $website= Website::orderBy('created_at', 'DESC')->paginate();
    	 return view('admin.setting.website.index',compact('website'));
    }

     //store method
     public function store(Request $request)
     {
         //query builder
         $data=array();
         $data['website_name_en']=$request->website_name_en;
         $data['website_name_bn']=$request->website_name_bn;
         $data['website_link']=$request->website_link;
         DB::table('websites')->insert($data);

         $notification=array('messege' => 'Website Inserted!', 'alert-type' => 'success');
         return redirect()->route('website.index')->with($notification);
     }


     public function create()
     {
        $website=DB::table('websites')->first();
         return view('admin.setting.website.create', compact('website'));
     }

     //edit method
     public function edit($id)
     {
        $website=DB::table('websites')->first();
         return view('admin.setting.website.edit', compact('website'));
     }

    public function update(Request $request)
    {
    	 $data=array();
         $data['website_name_en']=$request->website_name_en;
         $data['website_name_bn']=$request->website_name_bn;
          $data['website_link']=$request->website_link;
          DB::table('websites')->where('id',$request->id)->update($data);

             $notification=array(
                        'messege'=>'Successfully Update',
                        'alert-type'=>'success'
                         );
            return Redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        //query builder
           DB::table('websites')->where('id',$id)->delete();
        //eleqoent ORM


        $notification=array('messege' => 'Website Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
