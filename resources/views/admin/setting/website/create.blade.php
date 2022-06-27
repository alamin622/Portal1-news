@extends('layouts.admin')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Craete Importent Website</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('website.index') }}">All Importent Website list</a></li>
                        <li class="breadcrumb-item active">Create Website</li>
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
                                <h3 class="card-title">Create Importent website -</h3>
                                <a href="{{ route('website.index') }}" class="btn btn-success">Go Back to Importent Website List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <div class="card-body">
                                    <form action="{{ route('website.store') }}" method="Post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Website Name English</label>
                                                <input type="text" class="form-control "  aria-describedby="emailHelp" name="website_name_en" required="">
                                              </div>


                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Website Name Bnagla </label>
                                                <input type="text" class="form-control "  aria-describedby="emailHelp" name="website_name_bn" required="">
                                              </div>

                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Website Link</label>
                                                <input type="text" class="form-control" aria-describedby="emailHelp" name="website_link" required="">
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

@endsection
