<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo = Photo::all();
        return view('admin.gallery.photo.index',compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $data=array();
         $data['title_en']=$request->title_en;
         $data['title_bn']=$request->title_bn;
         $data['type']=$request->type;

           //working with image
           $photo=$request->photo;
           $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            $photo->move('public/files/photo/',$photoname);  //without image intervention
           //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention

         $data['photo']='public/files/photo/'.$photoname;   // public/files/brand/plus-point.jpg
         DB::table('photos')->insert($data);

         $notification=array('messege' => 'Photo Inserted!', 'alert-type' => 'success');
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
        $photo=DB::table('photos')->first();
        return view('admin.gallery.photo.edit',compact('photo'));

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
        $data['title_en']=$request->title_en;
        $data['title_bn']=$request->title_bn;
        $data['type']=$request->type;

        if ($request->photo) {
            if (File::exists($request->old_logo)) {
                   unlink($request->old_logo);
              }
            $photo=$request->photo;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            //Image::make($photo)->resize(240,120)->save('public/files/photo/'.$photoname);
            $photo->move('public/files/photo/',$photoname);
            $data['photo']='public/files/photo/'.$photoname;
            DB::table('photos')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'photo updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
      }else{
        $data['photo']=$request->old_logo;
        DB::table('photos')->where('id',$request->id)->update($data);
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
        $data=DB::table('photos')->where('id',$id)->first();
    	$image=$data->photo;

    	if (File::exists($image)) {
    		 unlink($image);
    	}
    	DB::table('photos')->where('id',$id)->delete();
    	$notification=array('messege' => 'Photo Deleted!', 'alert-type' => 'success');
    	return redirect()->back()->with($notification);
    }

}
