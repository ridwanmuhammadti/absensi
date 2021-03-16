@extends('backend.master')

@section('content')
<div class="content">
    <div class="panel-header bg-success-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Data Jabatan</h2>
                    {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
                </div>
                <div class="ml-md-auto py-2 py-md-0">
{{--                     
                    <a href="/jabatan/cetak" class="btn btn-success " target="_blank"> <i class="fa fa-print"></i> Print</a>
              --}}
                   
                  
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-4">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Tambah Data Jabatan</div>
                        <form action="/jabatan/store" method="post" enctype="multipart/form-data">
                                    
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label >Kode Jabatan</label>
                                       <input type="text" name="kode" id="" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label >Nama Jabatan</label>
                                       <input type="text" name="nama_jabatan" id="" class="form-control">
                                    </div>
                                </div>
                        
                            
                            </div>
                          <button class="btn btn-success ml-2 mt-4" type="submit">Save</button>
                          
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card full-height">
                    <div class="card-body">
                        {{-- <div class="card-title">Overall statistics</div> --}}
                        <div class="table-responsive">
                            <table class="table table-striped text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jabatan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                           <td>{{ $item->kode }}</td>
                                            <td>{{ $item->nama_jabatan }}</td>
                                           
                                            <td>
                                           
                                             
                                                <a href="/jabatan/{{ $item->uuid }}/edit" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                              
                                            
                                            <a href="#" class="btn btn-danger btn-sm delete" jabatan-id="{{ $item->uuid }}" jabatan-nama="{{ $item->nama_jabatan }}" ><i class="far fa-trash-alt"></i></a>
             
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
    
    </div>
</div>
@endsection

@section('js')

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    // $('#select2').select2();
    } );

</script>

<script>
      $('.delete').click(function(){
        var jabatan_id = $(this).attr('jabatan-id');
        var jabatan_nama = $(this).attr('jabatan-nama');
        swal({
            title: "Yakin?",
            text: "Mau hapus Data jabatan "+jabatan_nama+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
              window.location = "/jabatan/"+jabatan_id+"/destroy";
              swal("Data Berhasil dihapus !!", {
                icon: "success",
              });
            } 
          });
      });
</script>

@endsection