@extends('layouts.admin')
@section('admin_content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Website Seeting Update</h1>
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
                                <h3 class="card-title">Website Seeting Update -</h3>
                                <a href="{{ route('setting.index') }}" class="btn btn-success">Website setting </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <div class="card-body">
                                        <form action="{{ route('setting.update',$setting->id) }}" method="Post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name"> Website Name</label>
                                                <input type="text" class="form-control " value="{{ $setting->name }}" aria-describedby="emailHelp" name="name" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="logo">logo</label>
                                                <input type="file"  class="dropify" data-height="140"  name="logo" >
                                                <input type="hidden" name="old_logo" value="{{ $setting->logo }}">
                                            </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Phone Bangla</label>
                                            <input type="text" class="form-control " value="{{ $setting->phone_bn }}" aria-describedby="emailHelp" name="phone_bn" required="">
                                          </div>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Phone English</label>
                                            <input type="text" class="form-control " value="{{ $setting->phone_en }}" aria-describedby="emailHelp" name="phone_en" required="">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="text" class="form-control " value="{{ $setting->email }}" aria-describedby="emailHelp" name="email" required="">
                                          </div>
                                           <div class="form-group">
                                            <label for="exampleInputEmail1">Addres Bangle</label>
                                             <textarea class="textarea" placeholder="Place some text here" name="address_bn"
                                         style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                             {{ $setting->address_bn }}
                                         </textarea>
                                          </div>
                                           <div class="form-group">
                                            <label for="exampleInputEmail1">Address English</label>
                                              <textarea class="textarea" placeholder="Place some text here" name="address_en"
                                         style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                 {{ $setting->address_en }}
                                         </textarea>
                                          </div>
                                            <div class="modal-footer">
                                                <button type="Submit" class="btn btn-success">update</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<script type="text/javascript">
	$('.dropify').dropify();

</script>

@endsection
