<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Image;
use File;
use DB;
class Brandcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
    	if ($request->ajax()) {
            $data=DB::table('brands')->get();
    		return DataTables::of($data)
    				->addIndexColumn()
    				->addColumn('action', function($row){

    					$actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="'.route('brand.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                      	</a>';

                       return $actionbtn;

    				})
    				->rawColumns(['action'])
    				->make(true);
    	}
    	return view('admin.category.brand.index');
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
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
         ]);

         $slug=Str::slug($request->brand_name, '-');

         $data=array();
         $data['brand_name']=$request->brand_name;
         $data['brand_slug']=Str::slug($request->brand_name, '-');
          //working with image
           $photo=$request->brand_logo;
           $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            $photo->move('public/files/brand/',$photoname);  //without image intervention
           //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention

         $data['brand_logo']='public/files/brand/'.$photoname;   // public/files/brand/plus-point.jpg
         DB::table('brands')->insert($data);

         $notification=array('messege' => 'Brand Inserted!', 'alert-type' => 'success');
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
        $data=DB::table('brands')->where('id',$id)->first();
    	return view('admin.category.brand.edit',compact('data'));
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
        $slug=Str::slug($request->brand_name, '-');
    	$data=array();
    	$data['brand_name']=$request->brand_name;
    	$data['brand_slug']=Str::slug($request->brand_name, '-');
        

    	if ($request->brand_logo) {
    		  if (File::exists($request->old_logo)) {
    		         unlink($request->old_logo);
    	        }
    		  $photo=$request->brand_logo;
    	      $photoname=$slug.'.'.$photo->getClientOriginalExtension();
    	      //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);
              $photo->move('public/files/brand/',$photoname);
    	      $data['brand_logo']='public/files/brand/'.$photoname;
    	      DB::table('brands')->where('id',$request->id)->update($data);
    	      $notification=array('messege' => 'Brand Inserted!', 'alert-type' => 'success');
    	      return redirect()->back()->with($notification);
    	}else{
		  $data['brand_logo']=$request->old_logo;
	      DB::table('brands')->where('id',$request->id)->update($data);
	      $notification=array('messege' => 'Brand Inserted!', 'alert-type' => 'success');
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
        $data=DB::table('brands')->where('id',$id)->first();
    	$image=$data->brand_logo;

    	if (File::exists($image)) {
    		 unlink($image);
    	}
    	DB::table('brands')->where('id',$id)->delete();
    	$notification=array('messege' => 'Brand Deleted!', 'alert-type' => 'success');
    	return redirect()->back()->with($notification);
    }
}
