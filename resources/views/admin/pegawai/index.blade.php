@extends('backend.master')

@section('content')
<div class="content">
    <div class="panel-header bg-success-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Data Pegawai</h2>
                    {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
                </div>
                <div class="ml-md-auto py-2 py-md-0">
              
                   <a href="/pegawai/cetak" class="mr-2 btn btn-info btn-round" target="_blank"> <i class="fa fa-print"></i> Print</a>
              {{-- 
                    <a href="/pegawai/filter/uraian" class="mr-2 btn btn-secondary btn-round"> <i class="fa fa-filter"></i> Filter pegawai</a>
             
                    <a href="/pegawai/filter/waktu" class="mr-2 btn btn-secondary btn-round"> <i class="fa fa-filter"></i> Filter Waktu</a>
              --}}
                    
                    <a href="#modal2" data-toggle="modal" class="btn btn-success btn-round"> <i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        {{-- <div class="card-title">Overall statistics</div> --}}
                        <div class="table-responsive">
                            <table class="table table-striped text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jabatan</th>
                                        <th>No Hp</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                @if ($item->jk == 'L')
                                                    Laki - laki @else
                                                    Perempuan
                                                @endif
                                             </td>
                                            <td>{{ $item->jabatan->nama_jabatan }}</td>
                                            <td>{{ $item->no_hp}}</td>
                                            <td>{{ $item->alamat }}</td>
                                         
                                           
                                            <td>
                                           
                                                <a href="/pegawai/{{ $item->uuid }}/show" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye "></i>
                                                </a>
                                                <a  href="/pegawai/{{ $item->uuid }}/edit"  class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                              
                                            
                                            <a href="#" class="btn btn-danger btn-sm delete" pegawai-id="{{ $item->uuid }}" pegawai-nama="{{ $item->nama }}"><i class="far fa-trash-alt"></i></a>
             
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

    
<!-- modal  add-->
<div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content tx-14">
        <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel2">Tambah Data</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/pegawai/store" method="POST" enctype="multipart/form-data">
                @csrf
             
              
         
           
              

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >NIP</label>
                           <input type="text" name="nip" id="" class="form-control">
                        </div>
                    </div>
                   

                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Nama Pegawai</label>
                           <input type="text" name="nama" id="" class="form-control">
                        </div>
                    </div>
                   

                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Email</label>
                           <input type="text" name="email" id="" class="form-control">
                        </div>
                    </div>
                   
                    <div class="col-6">
                        <div class="form-check mt-2">
                            <label>Jenis Kelamin</label><br>
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="jk" value="L" checked="">
                                <span class="form-radio-sign">Laki - laki</span>
                            </label>
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" type="radio" name="jk" value="P">
                                <span class="form-radio-sign">Perempuan</span>
                            </label>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jabatan</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jabatan_id">
                                @foreach ($jabatan as $item)
                                    
                                <option value="{{ $item->id }}">{{ $item->kode }} | {{ $item->nama_jabatan }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                </div>
         
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >No Hp</label>
                           <input type="text" name="no_hp" id="" class="form-control">
                        </div>
                    </div>
                   
                    <div class="col-6">
                        <div class="form-group">
                            <label >Foto</label>
                           <input type="file" name="foto" id="" class="form-control">
                        </div>
                    </div>
                </div>
         
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Alamat</label>
                            <textarea name="alamat" class="form-control" id="" ></textarea>
                        
                        </div>
                    </div>
                   
                 
                </div>

                <br>
               
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success tx-13"><i data-feather="save"
                            class="wd-10 mg-r-5"></i>
                        Simpan</button>
                </div>
            </form>
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
    } );

</script>

<script>
      $('.delete').click(function(){
        var pegawai_id = $(this).attr('pegawai-id');
        var pegawai_nama = $(this).attr('pegawai-nama');
        swal({
            title: "Yakin?",
            text: "Mau hapus Data pegawai "+pegawai_nama+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
              window.location = "/pegawai/"+pegawai_id+"/destroy";
              swal("Data Berhasil dihapus !!", {
                icon: "success",
              });
            } 
          });
      });
</script>
@endsection