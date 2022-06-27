@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal"> + Add New</button>
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
                <h3 class="card-title">All categories list here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Category Englisg</th>
                      <th>Category Bangla</th>

                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                   @foreach($data as $key=>$row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->category_en}}</td>
                      <td>{{ $row->category_bn}}</td>
                      <td>
                        <a href="{{ route('category.edit', [$row->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                        <a href="{{ route('category.delete',$row->id) }}" class="btn btn-danger" id="delete"> <i class="fa fa-trash"></i> </a>
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

{{-- category insert modal --}}
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('category.store') }}" method="Post">
        @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="category_en">Category English</label>
            <input type="text" class="form-control" id="category_en" name="category_en" required="">
            <small id="emailHelp" class="form-text text-muted">This is your English category</small>
          </div>
          <div class="form-group">
            <label for="category_bn">Category Bangla</label>
            <input type="text" class="form-control" id="category_bn" name="category_bn" required="">
            <small id="emailHelp" class="form-text text-muted">This is your bangla category</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">

</script>

@endsection
