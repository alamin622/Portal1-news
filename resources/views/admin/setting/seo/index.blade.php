@extends('layouts.admin')
@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Seo Update</h1>
                </div><!-- /.col -->
                <!-- /.col -->
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
                                <h3 class="card-title">Seo Update -</h3>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <div class="card-body">
                                        <form action="{{ route('seo.update',$seo->id) }}" method="Post">
                                    @csrf
                                      <div class="modal-body">
                                        <div class="form-group ">
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Keyword</label> <br>
                                            <input type="text" class="form-control " multiple  data-role="tagsinput" value="{{ $seo->meta_keyword }}" aria-describedby="emailHelp" name="meta_keyword"  placeholder="Type and Hit Enter">
                                        </div>
                                            <label for="exampleInputEmail1">Author</label>
                                            <input type="text" class="form-control " value="{{ $seo->meta_author }}" aria-describedby="emailHelp" name="meta_author" required="">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Title</label>
                                            <input type="text" class="form-control " value="{{ $seo->meta_title }}" aria-describedby="emailHelp" name="meta_title" required="">
                                          </div>

                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Description</label>
                                            <input type="text" class="form-control " value="{{ $seo->meta_description }}" aria-describedby="emailHelp" name="meta_description" required="">
                                          </div>
                                           <div class="form-group">
                                            <label for="exampleInputEmail1">Google Analytics</label>
                                            <input type="text" class="form-control " value="{{ $seo->google_analytics }}" aria-describedby="emailHelp" name="google_analytics" required="">
                                          </div>
                                           <div class="form-group">
                                            <label for="exampleInputEmail1">Alexa Analytics</label>
                                            <input type="text" class="form-control " value="{{ $seo->alexa_analytics }}" aria-describedby="emailHelp" name="alexa_analytics" required="">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Google Verification</label>
                                            <input type="text" class="form-control " value="{{ $seo->google_verification }}" aria-describedby="emailHelp" name="google_verification" required="">
                                          </div>

                                        <div class="modal-footer">
                                            <button type="Submit" class="btn btn-success">Update</button>
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


@endsection
