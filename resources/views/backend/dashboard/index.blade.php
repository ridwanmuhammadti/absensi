@extends('backend.master')

@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">ABSENSI</h2>
                
                </div>
              
              

            </div>
        </div>
    </div>
   
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
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="ket" class="form-control" placeholder="keterangan ...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-info mt-2" name="btnIn" value="in" {{ $info['btnIn'] }}>ABSEN MASUK</button>
                               

                               
                                    <button type="submit" class="btn btn-info mt-2 ml-4" name="btnOut" value="out" {{ $info['btnOut'] }}>ABSEN KELUAR</button>
                                </div>
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
                                          <td>{{ $item->ket }}</td>
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