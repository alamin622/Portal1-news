@extends('layouts.admin')

@section('admin_content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Ads </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default"> + Add New</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All  Ads  List Here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="" class="table table-bordered table-striped table-sm ytable">
                    <thead>
                    <tr>
                        <th>Sl</th>
                      <th>Link</th>
                      <th>Ads</th>
                      <th> Type</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($ads as $row)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $row->link }}</td>

                          <td>
                              @if($row->type==2)
                            <img src="{{ asset($row->ads) }}" style="height: 70px; width: 300px;">
                        @else
                            <img src="{{ asset($row->ads) }}" style="height: 70px; width: 80px;">
                        @endif  <td>
                              @if($row->type == 2)
                                    <span class="badge badge-success">Horizontal Ads</span>
                                    @else
                                    <span class="badge badge-info">Vertical Ads </span>
                                    @endif
                          </td>
                          <td>
                            <a href="{{ route('horizontal.edit',$row->id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                            <a href="{{ route('horizontal.delete',$row->id) }}" class="btn btn-danger" id="delete"> <i class="fa fa-trash"></i> </a>
                      </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
	          </div>
	      </div>
	  </div>
	</div>
</section>
</div>


<!--photo added modal-->
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Insert new Ads</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <form action="{{ route('horizontal.store') }}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="">Link</label>
            <input type="text" class="form-control"  name="link" required="">
            <small id="emailHelp" class="form-text text-muted">This is your link  </small>
            </div>

            <div class="form-group">
            <label for="ads">Ads Photo= </label>
            <input type="file" class="dropify" data-height="140" id="input-file-now" name="ads" required="">
            <small id="emailHelp" class="form-text text-muted">This is your ads </small>
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Type</label>
            <select class="form-control" name="type" required>
                <option selected="" disabled="">==choose one==</option>
                <option value="2">Horizontal Ads</option>
                <option value="1">Vertical Ads </option>
            </select>
            </div>

            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </form>
    </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<script type="text/javascript">
	$('.dropify').dropify();

</script>
@endsection
