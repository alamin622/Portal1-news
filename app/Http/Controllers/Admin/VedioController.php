<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vedio;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class VedioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vedio = Vedio::all();
        return view('admin.gallery.vedio.index',compact('vedio'));
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
        $data['embed_code']=$request->embed_code;
        $data['type']=$request->type;
        DB::table('vedios')->insert($data);

        $notification=array('messege' => 'Vedio Inserted!', 'alert-type' => 'success');
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
        $vedio=DB::table('vedios')->first();
        return view('admin.gallery.vedio.edit',compact('vedio'));

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
        $data['embed_code']=$request->embed_code;
        $data['type']=$request->type;


            DB::table('vedios')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'vedio updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('vedios')->where('id',$id)->delete();
    	
    	$notification=array('messege' => 'Photo Deleted!', 'alert-type' => 'success');
    	return redirect()->back()->with($notification);

    }
}
