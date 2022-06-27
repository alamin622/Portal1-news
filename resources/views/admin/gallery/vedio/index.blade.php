@extends('layouts.admin')

@section('admin_content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Vedio Gallery</h1>
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
                <h3 class="card-title">All Vedio  List Here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="" class="table table-bordered table-striped table-sm ytable">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Title English Name</th>
                      <th>Title Bangla Name</th>
                      <th>Embed code</th>
                      <th> Type</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($vedio as $row)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $row->title_en }}</td>
                          <td>{{ $row->title_bn }}</td>
                          <td>{{ $row->embed_code }}</td>
                          <td>
                              @if($row->type == 1)
                                    <span class="badge badge-success">Big Photo</span>
                                    @else
                                    <span class="badge badge-info">Small Photo</span>
                                    @endif
                          </td>
                          <td>
                            <a href="{{ route('vedio.edit',$row->id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                            <a href="{{ route('vedio.delete',$row->id) }}" class="btn btn-danger" id="delete"> <i class="fa fa-trash"></i> </a>
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
        <h4 class="modal-title">Insert new vedio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <form action="{{ route('vedio.store') }}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="title_en">Title Name English</label>
            <input type="text" class="form-control"  name="title_en" required="">
            <small id="emailHelp" class="form-text text-muted">This is your title english </small>
            </div>
            <div class="form-group">
            <label for="title_bn">Title Name Bangla</label>
            <input type="text" class="form-control"  name="title_bn" required="">
            <small id="emailHelp" class="form-text text-muted">This is your title Bangla </small>
            </div>

            <div class="form-group">
                <label for="embed_code">Embed Code</label>
                <textarea type="text" class="form-control " aria-describedby="emailHelp" name="embed_code" required="">

                </textarea>
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Type</label>
            <select class="form-control" name="type" required>
                <option selected="" disabled="">==choose one==</option>
                <option value="1">Big Photo</option>
                <option value="0">Small Photo</option>
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


@endsection
