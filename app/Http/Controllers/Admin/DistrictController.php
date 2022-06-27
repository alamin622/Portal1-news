<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DistrictController extends Controller
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
        $data = District::orderBy('created_at', 'DESC')->paginate();
        return view('admin.category.district.index', compact('data'));
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
            'district_en' => 'required|unique:districts|max:55',
            'district_bn' => 'required|unique:districts|max:55'
        ]);
        District::create([
            'district_en'=> $request->district_en,
            'district_bn'=> $request->district_bn,
        ]);

        $notification=array('messege' => 'District Inserted!', 'alert-type' => 'success');
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
        $data = District::find($id);
        return view('admin.category.district.edit',compact('data'));

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
            'district_en' => 'required|max:55',
            'district_bn' => 'required|max:55',

        ]);
        //Eloquent ORM
        $data=array();
        $data['district_en']=$request->district_en;
        $data['district_bn']=$request->district_bn;
        DB::table('districts')->where('id',$request->id)->update($data);



         $notification=array('messege' => 'District Updated!', 'alert-type' => 'success');
         return Redirect()->route('district.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district=District::find($id);
        $district->delete();

        $notification=array('messege' => 'district Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
