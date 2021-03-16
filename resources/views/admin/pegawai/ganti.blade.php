@extends('backend.master')

@section('content')
<div class="content">
    <div class="panel-header bg-success-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Edit Data {{ $data->nama }}</h2>
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
                        <form action="/gantipassword/{{ $data->uuid }}/update" method="post" enctype="multipart/form-data">
                            @csrf
                 
            
                            </div>
            
                            <div class="row ml-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Password Lama</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="password"  name="password" class="form-control" >
                                        </div>
                                    </div>
                             
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Password Baru</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="password" id="password" name="new_password"  class="form-control"  onkeyup='check();'>
                                        </div>
                                    </div>
                             
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Konfirmasi Password Baru</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id='message'></span>
                                            </div>
                                            <input type="password" name="new_password" id="confirm_password"  class="form-control"  onkeyup='check();'>
                                        </div>
                                    </div>
                                   
                                </div>
                               
                               
                             
                            </div>
        
                        <br>
                       
                        <div class="modal-footer">
                            <a href="/dashboard" class="btn btn-secondary tx-13" >Kembali</a>
                            <button id="submit" type="submit" class="btn btn-warning tx-13"><i
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



<script>
		

    var check = function() {
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('submit').disabled = false;
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = '<i class="fa fa-check" aria-hidden="true"></i>';
      } else {
        document.getElementById('submit').disabled = true;
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = '<i class="fa fa-close" aria-hidden="true"></i>';
      }
    }
        </script>

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