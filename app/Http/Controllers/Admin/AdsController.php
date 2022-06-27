<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ads=DB::table('ads')->get();
        return view('admin.ads.horizontal.index',compact('ads'));
    }


    public function store(Request $request)
    {

         $data=array();
         $data['link']=$request->link;
         $data['type']=$request->type;

           //working with image
           $photo=$request->ads;
           $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            $photo->move('public/files/photo/',$photoname);  //without image intervention
           //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention

         $data['ads']='public/files/photo/'.$photoname;   // public/files/brand/plus-point.jpg
         DB::table('ads')->insert($data);

         $notification=array('messege' => 'Ads Inserted!', 'alert-type' => 'success');
         return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads = Ads::find($id);
        return view('admin.ads.horizontal.edit',compact('ads'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $data=array();
        $data['link']=$request->link;
         $data['type']=$request->type;


        if ($request->ads) {
            if (File::exists($request->old_logo)) {
                   unlink($request->old_logo);
              }
            $photo=$request->ads;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            //Image::make($photo)->resize(240,120)->save('public/files/photo/'.$photoname);
            $photo->move('public/files/photo/',$photoname);
            $data['ads']='public/files/photo/'.$photoname;
            DB::table('ads')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'photo updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
      }else{
        $data['ads']=$request->old_logo;
        DB::table('ads')->where('id',$request->id)->update($data);
        $notification=array('messege' => 'photo updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
        }
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=DB::table('ads')->where('id',$id)->first();
    	$image=$data->ads;

    	if (File::exists($image)) {
    		 unlink($image);
    	}
    	DB::table('ads')->where('id',$id)->delete();
    	$notification=array('messege' => 'Ads Deleted!', 'alert-type' => 'success');
    	return redirect()->back()->with($notification);
    }
}
