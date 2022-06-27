@extends('layouts.admin')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Craete Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post list</a></li>
                        <li class="breadcrumb-item active">Create Post</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Create Post -</h3>
                                <a href="{{ route('post.index') }}" class="btn btn-success">Go Back to Category List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <div class="card-body">
                                    <form action="{{ route('post.store') }}" method="Post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="modal-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="title_en">Title English</label>
                                                  <input type="text" class="form-control" id="title_en" name="title_en" placeholder="title english">
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="title_bn">Title Bnagla</label>
                                                  <input type="text" class="form-control" id="title_bn" name="title_bn" placeholder="title bangla">
                                                </div>
                                              </div>



                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="title_en">Category</label>
                                               <select name="cat_id" id="" class="form-control">
                                                   <option selected="" disabled="">==Chosse==</option>
                                                   @foreach ($category as $row )
                                                <option value="{{ $row->id }}">{{ $row->category_en }}| {{ $row->category_bn }}</option>
                                                   @endforeach
                                                   </select>
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="exampleInputPassword1">SubCategory</label>
                                                    <select name="subcat_id" class="form-control" id="subcat_id">
                                                                    <option selected="" disabled="">==choose one==</option>
                                                          </select>
                                                  </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="title_en">District</label>
                                                       <select name="dist_id" id="" class="form-control">
                                                           <option selected="" disabled="">==Chosse==</option>
                                                           @foreach ($district as $row )
                                                        <option value="{{ $row->id }}">{{ $row->district_en }}| {{ $row->district_bn }}</option>
                                                           @endforeach
                                                           </select>
                                                        </div>
                                                        <div class="form-group  col-md-6">
                                                            <label for="exampleInputPassword1">SubDistrict</label>
                                                            <select name="subdist_id" class="form-control" id="subdist_id">
                                                                            <option selected="" disabled="">==choose one==</option>

                                                                  </select>
                                                          </div>
                                                     </div>

                                                     <div class="form-group">
                                                        <label for="image">File input</label>
                                                        <div class="input-group">
                                                          <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="image" name="image">
                                                            <label class="custom-file-label" for="image">Choose file</label>
                                                          </div>
                                                          <div class="input-group-append">
                                                            <span class="input-group-text" id="">Upload</span>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="form-group col-md-6">
                                                          <label for="exampleInputEmail1">Tags Bangla</label>
                                                          <input type="text" class="form-control" id="exampleInputEmail1"  name="tags_bn">
                                                        </div>
                                                        <div class="form-group  col-md-6">
                                                          <label for="exampleInputPassword1">Tags English</label>
                                                          <input type="text" class="form-control" id="exampleInputPassword1" name="tags_en">
                                                        </div>
                                                     </div>

                                                        <div class="form-group  col-md-12">
                                                          <label for="exampleInputPassword1">Details English</label>
                                                           <textarea class="textarea" placeholder="Place some text here" name="details_en"
                                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                        </div>

                                                          <div class="form-group  col-md-12">
                                                          <label for="exampleInputPassword1">Details Bangla</label>
                                                           <textarea class="textarea" placeholder="Place some text here" name="details_bn"
                                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                        </div>
                                                        <hr>
                                                        <h4 class="text-center">Extra Option</h4>
                                                        <div class="row">
                                                            <div class="form-check col-lg-3">
                                                            <input class="form-check-input" type="checkbox" id="headline" name="headline" value="1">
                                                            <label class="form-check-label" for="gridCheck"> Headline </label>
                                                            </div>
                                                            <div class="form-check col-lg-3">
                                                                <input class="form-check-input" type="checkbox" id="first_section" name="first_section" value="1">
                                                                <label class="form-check-label" for="gridCheck"> General big thaumbnail </label>
                                                                </div>

                                                             <div class="form-check col-lg-3">
                                                            <input class="form-check-input" type="checkbox" id="first_section_thumbnail" name="first_section_thumbnail" value="1">
                                                            <label class="form-check-label" for="gridCheck"> First section </label>
                                                            </div>

                                                             <div class="form-check col-lg-3">
                                                            <input class="form-check-input" type="checkbox" id="bigthumbnail" name="bigthumbnail" value="1">
                                                            <label class="form-check-label" for="gridCheck"> First section thumbnail </label>
                                                            </div>
                                                       </div>

                                                <div class="modal-footer">
                                                    <button type="Submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                            </form>

                                </div>
                            </div>
                            </div>
                        </div>
                   </div>
               </div>
          </div>
     </div>
    </div>
</div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
          $('select[name="cat_id"]').on('change', function(){
              var cat_id = $(this).val();
              if(cat_id) {
                  $.ajax({
                      url: "{{  url('/get/subcat/') }}/"+cat_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subcat_id").empty();
                               $.each(data,function(key,value){
                                   $("#subcat_id").append('<option value="'+value.id+'">'+value.subcategory_bn+'</option>');
                               });

                      },

                  });
              } else {
                  alert('danger');
              }

          });
      });

 </script>

 <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="dist_id"]').on('change', function(){
              var dist_id = $(this).val();
              if(dist_id) {
                  $.ajax({
                      url: "{{  url('/get/subdist/') }}/"+dist_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         $("#subdist_id").empty();
                               $.each(data,function(key,value){
                                   $("#subdist_id").append('<option value="'+value.id+'">'+value.subdistrict_bn+'</option>');
                               });

                      },

                  });
              } else {
                  alert('danger');
              }

          });
      });

 </script>

@endsection
