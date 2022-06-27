@extends('layouts.admin')
@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Social Update</h1>
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
                                <h3 class="card-title">Social Update  -</h3>

                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <div class="card-body">
                                        <form action="{{ route('social.update',$social->id) }}" method="Post">
                                    @csrf
                                      <div class="modal-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Facebook</label>
                                            <input type="text" class="form-control " value="{{ $social->facebook }}" aria-describedby="emailHelp" name="facebook" required="">
                                          </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Twitter</label>
                                            <input type="text" class="form-control " value="{{ $social->twitter }}" aria-describedby="emailHelp" name="twitter" required="">
                                          </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Linkedin</label>
                                            <input type="text" class="form-control " value="{{ $social->linkedin }}" aria-describedby="emailHelp" name="linkedin" required="">
                                          </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Instagram</label>
                                            <input type="text" class="form-control " value="{{ $social->instagram }}" aria-describedby="emailHelp" name="instagram" required="">
                                          </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Youtube</label>
                                            <input type="text" class="form-control " value="{{ $social->youtube }}" aria-describedby="emailHelp" name="youtube" required="">
                                          </div>

                                        <div class="modal-footer">
                                            <button type="Submit" class="btn btn-success">update</button>
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
