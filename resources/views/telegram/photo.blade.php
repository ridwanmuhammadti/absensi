@extends('backend.master')

@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Data Guru</h2>
                    {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
                </div>
                <div class="ml-md-auto py-2 py-md-0">
              
                  
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-4">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Tambah Data</div>
                        <form action="/store-photo" method="post" enctype="multipart/form-data">
                                    
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label >Foto</label>
                                       <input type="file" name="file" id="" class="form-control" >
                                    </div>
                                </div>
                              
                        


                            </div>
                          <button class="btn btn-success ml-2 mt-4" type="submit">Save</button>
                          
                    </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

@endsection