@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit SubCategory</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('subcategory.index') }}">SubCategory list</a></li>
                        <li class="breadcrumb-item active">Edit SubCategory</li>
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
                                <h3 class="card-title">Edit Sub Category -</h3>
                                <a href="{{ route('subcategory.index') }}" class="btn btn-success">Go Back to Sub Category List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <div class="card-body">
                                    <form action="{{ route('subcategory.update',$data->id) }}" method="Post">
                                            @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="category_name">Category Name</label>
                                                <select class="form-control" name="category_id" required="">
                                                    @foreach($category as $row)
                                                    <option value="{{ $row->id }}" @if($row->id==$data->category_id) selected="" @endif >{{ $row->category_en }} | {{ $row->category_bn }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="subcategory_en">SubCategory Name English</label>
                                                <input type="text" class="form-control"  name="subcategory_en" value="{{ $data->subcategory_en }}" required="">
                                                <small id="emailHelp" class="form-text text-muted">This is your sub category</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="subcategory_bn">SubCategory Name bangla</label>
                                                <input type="text" class="form-control"  name="subcategory_bn" value="{{ $data->subcategory_bn }}" required="">
                                                <small id="emailHelp" class="form-text text-muted">This is your sub category</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="Submit" class="btn btn-primary">Update</button>
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
