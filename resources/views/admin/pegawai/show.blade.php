@extends('backend.master')

@section('content')
<div class="content">
    <div class="panel-header bg-success-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Data {{ $pegawai->nama }}</h2>
                    {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> --}}
                </div>
                <div class="ml-md-auto py-2 py-md-0">
{{-- 
                    <a href="/pegawai/{{ $pegawai->uuid }}/kartu" target="_blank" class="btn btn-success">
                        <i class="fa fa-print"></i> Cetak Kartu Pelajar</a>
                    <a href="/pegawai/{{ $pegawai->uuid }}/edit" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Edit Data</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                        <div class="profile-picture">
                            <div class="avatar avatar-xl">
                                <img src="{{ url('/uploads/images/'.$pegawai->foto) }}" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-profile text-center">
                            <div class="name">{{ $pegawai->nama }}</div>
                            <div class="job">NIP : {{ $pegawai->nip }}</div>
                            <div class="job">Email : {{ $pegawai->email }}</div>
                            <div class="job">Jabatan : {{ $pegawai->jabatan->nama_jabatan }}</div>
                            <div class="job">Jenis Kelamin : @if ($pegawai->jk == 'L') Laki - laki @else Perempuan
                                
                                @endif</div>
                                <div class="job">Alamat : {{ $pegawai->alamat }}</div>
                            
                            <div class=" mt-4">
                                <div class="col-md-12 auto">
                                    
                                        <a href="/pegawai/{{ $pegawai->uuid }}/edit" class=" btn btn-warning ">Edit</a>

                                  
                                        {{-- <a target="_blank" href="/pegawai/{{ $pegawai->uuid }}/kartu" class="btn btn-secondary ml-2 ">Cetak</a> --}}

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
@endsection

@section('js')
<script>
    
    Circles.create({
			id:'circles-2',
			radius:45,
			value:{{ $pegawai->point }},
			maxValue:100,
			width:7,
			text: {{ $pegawai->point }},
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
        Circles.create({
			id:'circles-1',
			radius:45,
			value:{{ $pegawai->point }},
			maxValue:100,
			width:7,
			text: {{ $pegawai->point }},
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:{{ $pegawai->point }},
			maxValue:100,
			width:7,
			text: {{ $pegawai->point }},
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
</script>

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