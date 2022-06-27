@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit District</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('district.index') }}">District list</a></li>
                        <li class="breadcrumb-item active">Edit District</li>
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
                                <h3 class="card-title">Edit District -</h3>
                                <a href="{{ route('district.index') }}" class="btn btn-success">Go Back to District List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <div class="card-body">
                                    <form action="{{ route('district.update',$data->id) }}" method="Post">
                                            @csrf
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="district_en">District Name English</label>
                                                <input type="text" class="form-control"  name="district_en" value="{{ $data->district_en }}" required="">
                                                <small id="emailHelp" class="form-text text-muted">This is your sub category</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="district_bn">District Name bangla</label>
                                                <input type="text" class="form-control"  name="district_bn" value="{{ $data->district_bn }}" required="">
                                                <small id="emailHelp" class="form-text text-muted">This is your sub category</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="Submit" class="btn btn-success">Update</button>
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
<script type="text/javascript">

</script>
