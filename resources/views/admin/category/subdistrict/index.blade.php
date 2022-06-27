@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub District</h1>
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
                <h3 class="card-title">All sub-District list here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>District Name</th>
                      <th>Sub District Name English</th>
                      <th>Sub District Name Bangla</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                   @foreach($data as $key=>$row)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{optional($row->district)->district_bn}}</td>
                      <td>{{ $row->subdistrict_en }}</td>
                      <td>{{ $row->subdistrict_bn }}</td>

                      <td>
                        <a href="{{ route('subdistrict.edit', [$row->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                      	<a href="{{ route('subdistrict.delete',$row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New subdistrict</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="{{ route('subdistrict.store') }}" method="Post">
      	@csrf
      <div class="modal-body">
      	  <div class="form-group">
            <label for="district_en">DIstrict Name</label>
            <select class="form-control" name="district_id" required="">
            	@foreach($district as $row)
            	  <option value="{{ $row->id }}">{{ $row->district_en }} | {{ $row->district_bn }}</option>
            	@endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="subdistrict_en">Subdistrict English</label>
            <input type="text" class="form-control" id="subdistrict_en" name="subdistrict_en" required="">
            <small id="emailHelp" class="form-text text-muted">This is your English subdistrict</small>
          </div>
          <div class="form-group">
            <label for="subdistrict_bn">Subdistrict Bangla</label>
            <input type="text" class="form-control" id="subdistrict_bn" name="subdistrict_bn" required="">
            <small id="emailHelp" class="form-text text-muted">This is your bangla subdistrict</small>
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


@endsection
