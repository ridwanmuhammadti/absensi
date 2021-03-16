@extends('backend.master')

@section('content')
<div class="content">
    <div class="panel-header bg-success-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Ganti Password {{ $data->nama }}</h2>
                    {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
                </div>
              
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <form action="/pegawai/{{ $data->uuid }}/update" method="post" enctype="multipart/form-data">
                            @csrf
                 
           
              

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label >NIP</label>
                                       <input type="text" value="{{ $data->nip }}" name="nip" id="" class="form-control">
                                    </div>
                                </div>
                               
            
                            </div>
            
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label >Nama Pegawai</label>
                                       <input type="text" name="nama" value="{{ $data->nama }}" id="" class="form-control">
                                    </div>
                                </div>
                               
            
                            </div>
            
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label >Email</label>
                                       <input type="text" name="email" id="" class="form-control" value="{{ $data->email }}" readonly>
                                    </div>
                                </div>
                               
                                <div class="col-6">
                                    <div class="form-check mt-2">
                                        <label>Jenis Kelamin</label><br>
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="jk" value="L" @if ($data->jk == 'L')
                                            checked   
                                            @endif>
                                            <span class="form-radio-sign">Laki - laki</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="jk" value="P" @if ($data->jk == 'P')
                                            checked   
                                            @endif>
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
                                                
                                            <option value="{{ $item->id }}" @if ($data->jabatan_id == $item->id)
                                                selected   
                                                @endif>{{ $item->kode }} | {{ $item->nama_jabatan }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                     
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label >No Hp</label>
                                       <input type="text" name="no_hp" id="" class="form-control" value="{{ $data->no_hp }}">
                                    </div>
                                </div>
                               
                                <div class="col-6">
                                    <div class="form-group">
                                        <label >Foto</label>
                                       <input type="file" name="foto" id="" class="form-control">
                                       <span style="text-transform: initial">Kosongkan jika tidak ingin diupdate</span>
                                    </div>
                                </div>
                            </div>
                     
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label >Alamat</label>
                                        <textarea name="alamat" class="form-control" id="" >{{ $data->alamat }}</textarea>
                                    
                                    </div>
                                </div>
                               
                             
                            </div>
        
                        <br>
                       
                        <div class="modal-footer">
                            <a href="/pelanggaran" class="btn btn-secondary tx-13" >Kembali</a>
                            <button type="submit" class="btn btn-warning tx-13"><i
                                    class="wd-10 mg-r-5"></i>
                                Update</button>
                        </div>
                    </form>
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
    $('#myTable2').DataTable();
    } );

</script>

<script>
      $('.delete').click(function(){
        var point_id = $(this).attr('point-id');
        var point_nama = $(this).attr('point-nama');
        swal({
            title: "Yakin?",
            text: "Mau hapus Data point dengan Kode "+point_nama+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
              window.location = "/point/"+point_id+"/destroy";
              swal("Data Berhasil dihapus !!", {
                icon: "success",
              });
            } 
          });
      });
</script>
@endsection