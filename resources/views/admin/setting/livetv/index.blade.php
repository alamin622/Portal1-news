@extends('layouts.admin')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Live Tv Update</h1>
                </div><!-- /.col -->
                <!-- /.col -->
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
                                <h3 class="card-title">Live Tv Update -</h3>
                                <a href="" class="btn btn-success">LiveTv </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">

                                    <div class="card-body col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">LIVETV Settings</h4>
                                            @if($livetv->status == 1)
                                                 <a href="{{ route('deactive.livetv',$livetv->id) }}" style="float: right" class="btn btn-danger">Deactive</a>
                                             @else
                                               <a href="{{ route('active.livetv',$livetv->id) }}" style="float: right" class="btn btn-success">Active</a>
                                             @endif
                                          </div>

                                          <div class="modal-body">
                                    <div class="card-body">
                                        <form action="{{ route('livetv.update', $livetv->id) }}" method="Post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Embed Code</label>
                                        <textarea type="text" class="form-control " aria-describedby="emailHelp" name="embed_code" required="">
                                            {{ $livetv->embed_code }}
                                        </textarea>
                                        @if($livetv->status == 1)
                                            <small class="text-success">Now LiveTV are Active</small>
                                        @else
                                            <small class="text-danger">Now LiveTV are Deactive</small>
                                         @endif
                                      </div>

                                        <div class="modal-footer">
                                            <button type="Submit" class="btn btn-success">Update</button>
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
