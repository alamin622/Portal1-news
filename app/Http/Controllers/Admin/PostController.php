<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

  //json data return
  public function GetSubcat($cat_id)
  {
       $sub=DB::table('subcategories')->where('category_id',$cat_id)->get();
       return response()->json($sub);
  }

  //get subdistrict
  public function GetSubDist($dist_id)
  {
        $sub=DB::table('subdistricts')->where('district_id',$dist_id)->get();
       return response()->json($sub);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $post=DB::table('posts')->orderBy('created_at', 'DESC')
            ->join('categories','posts.cat_id','categories.id')
            ->join('subcategories','posts.subcat_id','subcategories.id')
            ->select('posts.*','categories.category_bn','subcategories.subcategory_bn')
            ->get();

                  return view('admin.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            $category=DB::table('categories')->get();
     		$district=DB::table('districts')->get();
        return view('admin.post.create', compact('category','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //store post
    public function store(Request $request)
    {
     


          $validatedData = $request->validate([
               'cat_id' => 'required',
       ]);

          $data=array();
          $data['title_bn']=$request->title_bn;
          // $data['title_slug']=Str::slug($request->title_bn, '-');
          $data['title_en']=$request->title_en;
          $data['user_id']= Auth::id();
          $data['cat_id']=$request->cat_id;
          $data['subcat_id']=$request->subcat_id;
          $data['dist_id']=$request->dist_id;
          $data['subdist_id']=$request->subdist_id;
          $data['details_en']=$request->details_en;
          $data['details_bn']=$request->details_bn;
          $data['tags_bn']=$request->tags_bn;
          $data['tags_en']=$request->tags_en;
          $data['headline']=$request->headline;
          $data['first_section']=$request->first_section;
          $data['first_section_thumbnail']=$request->first_section_thumbnail;
          $data['bigthumbnail']=$request->bigthumbnail;
          $data['post_date']=date('d-m-Y');
          $data['post_month']=date("F");


            //working with image
            $photo=$request->image;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
             $photo->move('public/file/photo/',$photoname);  //without image intervention
            //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention

            $data['image']='public/file/photo/'.$photoname;   // public/files/brand/plus-point.jpg
            DB::table('posts')->insert($data);
            $notification=array('messege' => 'Post Inserted!', 'alert-type' => 'success');
            return Redirect()->route('post.index')->with($notification);

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
        $post=DB::table('posts')->where('id',$id)->first();
        $category=DB::table('categories')->get();
        $district=DB::table('districts')->get();
        return view('admin.post.edit',compact('post','category','district'));
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
        $validatedData = $request->validate([
               'cat_id' => 'required',

       ]);

        $data=array();
        $data['title_bn']=$request->title_bn;
        $data['title_en']=$request->title_en;
        $data['cat_id']=$request->cat_id;
        $data['subcat_id']=$request->subcat_id;
        $data['dist_id']=$request->dist_id;
        $data['subdist_id']=$request->subdist_id;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;
        $data['tags_bn']=$request->tags_bn;
        $data['tags_en']=$request->tags_en;
        $data['headline']=$request->headline;
        $data['first_section']=$request->first_section;
        $data['first_section_thumbnail']=$request->first_section_thumbnail;
        $data['bigthumbnail']=$request->bigthumbnail;

        if ($request->image) {
            if (File::exists($request->oldimage)) {
                unlink($request->oldimage);
            }
            $photo=$request->image;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            //Image::make($photo)->resize(240,120)->save('public/files/photo/'.$photoname);
            $photo->move('public/file/photo/', $photoname);
            $data['image']='public/file/photo/'.$photoname;
            DB::table('posts')->where('id', $request->id)->update($data);
            $notification=array('messege' => 'Post updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['image']=$request->oldimage;
            DB::table('posts')->where('id', $request->id)->update($data);
            $notification=array('messege' => 'Post updated!', 'alert-type' => 'success');
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
        $data=DB::table('posts')->where('id',$id)->first();
    	$image=$data->image;

    	if (File::exists($image)) {
    		 unlink($image);
    	}

        DB::table('posts')->where('id',$id)->delete();
         $notification=array(
                   'messege'=>'Successfully Post Deleted ',
                   'alert-type'=>'success'
                  );
          return Redirect()->back()->with($notification);
    }
}
