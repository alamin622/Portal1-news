<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //all category showing method
    public function index()
    {
        // $data=DB::table('categories')->get();  //query builder
        $data=DB::table('categories')->orderBy('created_at', 'DESC')->paginate();
       // $data=Category::orderBy('created_at', 'DESC')->paginate();  //eloquent ORM
        return view('admin.category.category.index',compact('data'));

    }
    //store method
    public function store(Request $request)
    {
        $validated = $request->validate([
           'category_en' => 'required|unique:categories|max:55',
           'category_bn' => 'required|unique:categories|max:55'
       ]);

        //query builder
        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['category_slug']=Str::slug($request->category_name, '-');
        // DB::table('categories')->insert($data);

        //Eloquent ORM
        Category::create([
            'category_en'=> $request->category_en,
            'category_bn'=> $request->category_bn,

        ]);

        $notification=array('messege' => 'Category Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //edit method
    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.category.edit', compact('data'));
    }
//update method
public function update(Request $request)
{
    $validated = $request->validate([
        'category_en' => 'required|max:55',
        'category_bn' => 'required|max:55',
    ]);

    //Eloquent ORM
    $data=array();
    $data['category_en']=$request->category_en;
    $data['category_bn']=$request->category_bn;
    DB::table('categories')->where('id',$request->id)->update($data);

     $notification=array('messege' => ' Category Updated!', 'alert-type' => 'success');
     return Redirect()->route('category.index')->with($notification);
}


    //delete category method
    public function destroy($id)
    {
        //query builder
           //DB::table('categories')->where('id',$id)->delete();
        //eleqoent ORM
        $category=Category::find($id);
        $category->delete();

        $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



}
