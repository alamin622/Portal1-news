<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use App\Models\District;
use Illuminate\Support\Facades\DB;
class SubdistrictController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subdistrict::all();
        $district = District::all();
        return view('admin.category.subdistrict.index', compact('data','district'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'subdistrict_en' => 'required|max:55',
            'subdistrict_bn' => 'required|max:55',
            'district_id' => 'required',
        ]);
      //Eloquent ORM
         Subdistrict::insert([
           'district_id'=> $request->district_id,
           'subdistrict_en'=> $request->subdistrict_en,
           'subdistrict_bn'=> $request->subdistrict_bn,

    ]);

    $notification=array('messege' => 'Sub District Inserted!', 'alert-type' => 'success');
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
        $data = Subdistrict::find($id);
        $district=District::all();
        return view('admin.category.subdistrict.edit', compact('data','district'));

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
        $validated = $request->validate([
            'subdistrict_en' => 'required|max:55',
            'subdistrict_bn' => 'required|max:55',
            'district_id' => 'required',
        ]);
        //Eloquent ORM

        $data=array();
        $data['subdistrict_en']=$request->subdistrict_en;
        $data['subdistrict_bn']=$request->subdistrict_bn;
        $data['district_id']=$request->district_id;
        DB::table('subdistricts')->where('id',$request->id)->update($data);

         $notification=array('messege' => 'Sub Districts Updated!', 'alert-type' => 'success');
         return Redirect()->route('subdistrict.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subdistrict=Subdistrict::find($id);
        $subdistrict->delete();

        $notification=array('messege' => 'Subdistrict Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
