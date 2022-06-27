<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class SubcategoryController extends Controller
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
       // $data = DB::table('subcategories')->leftjoin('categories','subcategories.category_id','categories.id')
        //->select('subcategories.*','categories.category_name')->get();
        $data =Subcategory::orderBy('created_at', 'DESC')->paginate();;
        $category=Category::all();
        return view('admin.category.subcategory.index', compact('data','category'));
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
            'subcategory_en' => 'required|max:55',
            'subcategory_bn' => 'required|max:55',
            'category_id' => 'required',
        ]);
      //Eloquent ORM
         Subcategory::create([
           'category_id'=> $request->category_id,
           'subcategory_en'=> $request->subcategory_en,
           'subcategory_bn'=> $request->subcategory_bn,

    ]);

    $notification=array('messege' => 'Sub Category Inserted!', 'alert-type' => 'success');
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
        $data = Subcategory::find($id);
        $category=Category::all();
        return view('admin.category.subcategory.edit', compact('data','category'));

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
            'subcategory_en' => 'required|max:55',
            'subcategory_bn' => 'required|max:55',
            'category_id' => 'required',
        ]);
        //Eloquent ORM

        $data=array();
        $data['subcategory_en']=$request->subcategory_en;
        $data['subcategory_bn']=$request->subcategory_bn;
        $data['category_id']=$request->category_id;
        DB::table('subcategories')->where('id',$request->id)->update($data);

         $notification=array('messege' => 'Sub Category Updated!', 'alert-type' => 'success');
         return Redirect()->route('subcategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //query builder
           //DB::table('categories')->where('id',$id)->delete();
        //eleqoent ORM
        $subcategory=Subcategory::find($id);
        $subcategory->delete();

        $notification=array('messege' => 'SubCategory Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
