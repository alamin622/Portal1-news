@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Importent Website</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <div class="d-flex justify-content-end">
                <a href="{{route('website.create')}}" class="btn btn-success">Add New</a>
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
                <h3 class="card-title">All Importent Websites list here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Website name ENglish </th>
                            <th>Website name Bangla </th>
                            <th>Website link </th>
                            <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>

                        @foreach($website as $key=>$row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->website_name_en}}</td>
                      <td>{{ $row->website_name_bn}}</td>
                      <td>{{ $row->website_link}}</td>
                      <td>
                        <a href="{{ route('website.edit', [$row->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                        <a href="{{ route('website.delete',$row->id) }}" class="btn btn-danger" id="delete"> <i class="fa fa-trash"></i> </a>
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
