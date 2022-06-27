
@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Role</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ route('role.index') }}" class="btn btn-sm btn-warning" style="float: right;" >Go back to index</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <section class="content">
      <div class="container-fluid">
        <div class="row"  >
          <div class="col-12" >
            <div class="card" style="justify-content: center">
              <div class="card-header">
                <h3 class="card-title">User Create</h3>
              </div>
              <form action="{{ route('role.store') }}" method="get" >
                @csrf

            <div class="form-layout " >
                <div class="row " style="justify-content: center">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label"> Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name"  required="">
                      </div>
                    </div><!-- col-4 -->
                    </div>
                    <!-- col-4 -->
                    <div class="row " style="justify-content: center">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Email <span class="tx-danger">*</span></label>
                        <input class="form-control" type="email" name="email"  required="">
                      </div>
                    </div>
                    </div>
                    <!-- col-4 -->
                    <div class="row " style="justify-content: center">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Password <span class="tx-danger">*</span></label>
                        <input class="form-control" type="password" name="password"  required="">
                      </div>
                    </div>

            </div>
            </div><!-- col-4 -->




              <!-- row -->
              <br><hr>
              <div class="form-layout " >
                <div class="row " style="justify-content: center">
                    <div class="col-lg-6">
              <div class="row" style="justify-content: center" >
                  <div class="col-lg-3">
                      <label class="ckbox">
                        <input type="checkbox" name="category" value="1">
                        <span>Category</span>
                      </label>
                  </div>
                  <div class="col-lg-3">
                    <label class="ckbox">
                      <input type="checkbox" name="district" value="1">
                      <span>District</span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label class="ckbox">
                      <input type="checkbox" name="post" value="1">
                      <span>Posts</span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label class="ckbox">
                      <input type="checkbox" name="setting" value="1">
                      <span>Setting</span>
                    </label>
                </div>


              </div>
              <div class="row">
                <div class="col-lg-3">
                    <label class="ckbox">
                      <input type="checkbox" name="gallery" value="1">
                      <span>Gallery</span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label class="ckbox">
                      <input type="checkbox" name="ads" value="1">
                      <span>Ads</span>
                    </label>
                </div>

                <div class="col-lg-3">
                    <label class="ckbox">
                      <input type="checkbox" name="role" value="1">
                      <span>Role</span>
                    </label>
                </div>

            </div>
        </div><!-- col-4 -->
    </div>



              </div>
            </div>

              <div class="modal-footer">
                  <button type="Submit" class="btn btn-success">update</button>
              </div>
            </div><!-- form-layout -->

            </form>
        </div>
      </div>
     </section>
  </div>

@endsection


