@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <div class="d-flex justify-content-end">
                <a href="{{route('post.create')}}" class="btn btn-success">Add New</a>
        </div>
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
                <h3 class="card-title">All Posts list here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Category </th>
                            <th>SubCategory </th>
                            <th>Title </th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>

                        @foreach($post as  $key=>$row)
                        <tr>
                          <td>{{ $row->category_bn }}</td>
                          <td>{{ $row->subcategory_bn }}</td>
                          
                           <td>{{ $row->title_bn }}</td>
                           <td><img src="{{ asset($row->image) }}" style="height:60px; width: 60px;"></td>
                             <td>{{ $row->post_date }}</td>
                          <td>
                                <a href="{{ route('post.edit',$row->id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                                <a href="{{ route('post.delete',$row->id) }}" class="btn btn-danger" id="delete"> <i class="fa fa-trash"></i> </a>
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


@endsection
