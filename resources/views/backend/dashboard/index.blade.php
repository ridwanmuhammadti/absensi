@extends('backend.master')

@section('content')
<div class="content">
    <div class="panel-header bg-success-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">ABSENSI</h2>
                
                </div>
              
              

            </div>
        </div>
    </div>
   
    @if (auth()->user()->role == 1)

    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                      
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-primary card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="flaticon-users"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Data Absen</p>
                                                    <h4 class="card-title">{{ $absenNow->count() }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-info card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="flaticon-success"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Masuk</p>
                                                    <h4 class="card-title">{{ $Masuk->count() }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-success card-round">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="flaticon-analytics"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Telat</p>
                                                    <h4 class="card-title">{{ $Telat->count() }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-secondary card-round">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="icon-big text-center">
                                                    <i class="flaticon-interface-6"></i>
                                                </div>
                                            </div>
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Alpha</p>
                                                    <h4 class="card-title">{{ $Alpha->count() }}</h4>
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
         
        </div>
    
    </div>


    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Absensi Hari ini {{ carbon\carbon::now()->translatedFormat('d F Y') }}</div>
                                <div class="card-tools">
                                    <a target="_blank" href="/absen/cetak/daynow" class="mr-2 btn btn-info btn-round" target="_blank"> <i class="fa fa-print mr-auto"></i> Print</a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="table-responsive">
                            <table class="table table-striped text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Ket</th>
                                    </tr>
                                </thead>
                            
                                  @forelse ($absenNow as $item)
                                  <tr>
                                          <td>{{ $item->user->pegawai->nama }}</td>
                                          <td>{{ $item->user->pegawai->jabatan->nama_jabatan }}</td>
                                          <td> {{carbon\carbon::parse($item->tanggal)->translatedFormat('d F Y')}}</td>
                                          <td>{{ $item->time_in }}</td>
                                          <td>{{ $item->time_out }}</td>
                                      
                                          <td>
                                              @if ($item->ket == 'Masuk')
                                              <button class="btn btn-success btn-rounded btn-sm">Masuk</button>
                                              @elseif ($item->ket == 'Telat')
                                              <button class="btn btn-success btn-rounded btn-sm">Telat</button>
                                              @elseif ($item->ket == 'Alpha')
                                              <button class="btn btn-success btn-rounded btn-sm">Alpha</button>
                                              @endif
                                            </td>
                                      </tr>
                                
                                        
                                    @empty
                                    <tr>
                                        <td colspan="6">Tidak Ada Data Absen</td>
                                    </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
    
    </div>
        
    @endif

    @if (auth()->user()->role == 2)
        

    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        
                        <div class="card-title text-center">{{ $info['status'] }}</div>
                    </div>
                    <div class="card-body">
                      <form action="/absen" method="post">
                           @csrf
                           <div class="row ">
                            <div class="col-md-6 ml-auto mr-auto">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <button type="submit" class="btn btn-info mt-2" name="btnIn" value="in" {{ $info['btnIn'] }}>ABSEN MASUK</button>
                                        {{-- </div>
                                        <div class="col-md-6"> --}}
        
                                       
                                            <button type="submit" class="btn btn-info mt-2 ml-4" name="btnOut" value="out" {{ $info['btnOut'] }}>ABSEN KELUAR</button>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">


                             
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         
        </div>
    
    </div>

    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        {{-- <div class="card-title">Riwayat Absen</div> --}}
                        <div class="table-responsive">
                            <table class="table table-striped text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Ket</th>
                                    </tr>
                                </thead>
                            
                                  @forelse ($absen as $item)
                                      <tr>
                                          <td> {{carbon\carbon::parse($item->tanggal)->translatedFormat('d F Y')}}</td>
                                          <td>{{ $item->time_in }}</td>
                                          <td>{{ $item->time_out }}</td>
                                     
                                          <td>
                                            @if ($item->ket == 'Masuk')
                                            <button class="btn btn-success btn-rounded btn-sm">Masuk</button>
                                            @elseif ($item->ket == 'Telat')
                                            <button class="btn btn-success btn-rounded btn-sm">Telat</button>
                                            @elseif ($item->ket == 'Alpha')
                                            <button class="btn btn-success btn-rounded btn-sm">Alpha</button>
                                            @endif
                                          </td>
                                      </tr>
                                
                                        
                                    @empty
                                    <tr>
                                        <td colspan="4">Tidak Ada Data Absen</td>
                                    </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
    
    </div>

    
    @endif


</div>
@endsection

@section('js')
    
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
   
    } );

</script>
@endsection