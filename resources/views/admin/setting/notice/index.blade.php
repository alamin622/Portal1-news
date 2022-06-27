@extends('layouts.admin')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Notice Setting</h1>
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
                                <h3 class="card-title">Update Notice -</h3>
                                <a href="{{ route('notice.index') }}" class="btn btn-success">Go Back to Notice List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">

                                    <div class="card-body col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Notice Settings</h4>
                                            @if($notice->status == 1)
                                                 <a href="{{ route('deactive.notice',$notice->id) }}" style="float: right" class="btn btn-danger">Deactive</a>
                                             @else
                                               <a href="{{ route('active.notice',$notice->id) }}" style="float: right" class="btn btn-success">Active</a>
                                             @endif
                                          </div>

                                          <div class="modal-body">
                                    <div class="card-body">
                                        <form action="{{ route('notice.update',$notice->id) }}" method="Post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Notice English Name</label>
                                        <textarea class="textarea" placeholder="Place some text here" name="notice_en"
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {{ $notice->notice_en }}
                                        </textarea>
                                    </div>
                                    <div class="form-group ">
                                        <label for="notice_bn">Notice Bangla Name</label>
                                        <input type="text" class="form-control" id="title_en" name="notice_bn" placeholder="title english"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  value="{{ $notice->notice_bn }}">

                                    </div>

                                    </div>
                                        @if($notice->status == 1)
                                            <small class="text-success">Now Notice are Active</small>
                                        @else
                                            <small class="text-danger">Now Notice are Deactive</small>
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
