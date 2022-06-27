@extends('layouts.admin')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Ads</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('horizontal.index') }}">Ads list</a></li>
                        <li class="breadcrumb-item active">Edit Photo</li>
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
                                <h3 class="card-title">Edit Ads -</h3>
                                <a href="{{ route('horizontal.index') }}" class="btn btn-success">Go Back to Ads List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <div class="card-body">
                                        <form action="{{ route('horizontal.update',$ads->id) }}" method="Post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="text" class="form-control"  name="link" required="" value="{{ $ads->link }}">
                                                <small id="emailHelp" class="form-text text-muted">This is your title english </small>
                                                </div>


                                                <div class="form-group">
                                                    <label for="ads">Photo</label>
                                                    <input type="file"  class="dropify" data-height="140"  name="ads" >
                                                    <input type="hidden" name="old_logo" value="{{ $ads->ads }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Type</label>
                                                    <select class="form-control" name="type" required>
                                                        <option selected="" disabled="">==choose one==</option>
                                                        <option value="2"  <?php  if ($ads->type == 2) {
                                                            echo "selected";
                                                       } ?> >Horizontal ads</option>
                                                        <option value="1" <?php  if ($ads->type == 1) {
                                                            echo "selected";
                                                       } ?>>Vertical Ads</option>
                                                    </select>
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



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script type="text/javascript">
	$('.dropify').dropify();

</script>

@endsection
