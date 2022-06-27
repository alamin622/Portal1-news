@extends('layouts.admin')
@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Namaz Update</h1>
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
                                <h3 class="card-title"> Namaz Update -</h3>
                               
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <div class="card-body">
                                        <form action="{{ route('namaz.update',$namaz->id) }}" method="Post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fajr</label>
                                        <input type="text" class="form-control " value="{{ $namaz->fajr }}" aria-describedby="emailHelp" name="fajr" required="">
                                      </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Johr</label>
                                        <input type="text" class="form-control " value="{{ $namaz->johr }}" aria-describedby="emailHelp" name="johr" required="">
                                      </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Asor</label>
                                        <input type="text" class="form-control " value="{{ $namaz->asor }}" aria-describedby="emailHelp" name="asor" required="">
                                      </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">magrib</label>
                                        <input type="text" class="form-control " value="{{ $namaz->magrib }}" aria-describedby="emailHelp" name="magrib" required="">
                                      </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Esha</label>
                                        <input type="text" class="form-control " value="{{ $namaz->esha }}" aria-describedby="emailHelp" name="esha" required="">
                                      </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Jummah</label>
                                        <input type="text" class="form-control " value="{{ $namaz->jummah }}" aria-describedby="emailHelp" name="jummah" required="">
                                      </div>
                                 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sunrise</label>
                                        <input type="text" class="form-control " value="{{ $namaz->sunrise }}" aria-describedby="emailHelp" name="sunrise" required="">
                                      </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Sunset</label>
                                    <input type="text" class="form-control " value="{{ $namaz->sunset }}" aria-describedby="emailHelp" name="sunset" required="">
                                  </div>
                                   
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
