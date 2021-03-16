<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    h4,h2{
        font-family:serif;
    }
        body{
            font-family:sans-serif;
        }
        table{
        border-collapse: collapse;
        width:100%;
      }
      table, th, td{
        border: 1px solid black;
      }
      th{
        text-align: center;
      }
      td{
        text-align: center;
      }
      br{
          margin-bottom: 5px !important;
      }
     .judul{
         text-align: center;
     }
     .header{
         margin-bottom: 0px;
         text-align: center;
         height: 150px;
         padding: 0px;
     }
     .pemko{
         width:100px;
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 18%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 72%;
         padding-left:0px;
         padding-right:10%;
     }
     hr{
         margin-top: 10%;
         height: 0.5px;
         background-color: black;
         width:100%;
     }
     .ttd{
         margin-left:65%;
         text-align: center;
         text-transform: uppercase;
     }
     .text-right{
         text-align:right;
     }
     .isi{
         padding:10px;
     }
    </style>
</head>
<body>
    <div class="header">
            <div class="logo">
                    {{-- <img  class="pemko" src="{{ asset('backend/logo/logo-sma.png') }}"> --}}
            </div>
            <div class="headtext">
                <h3 style="margin:0px;">RUMAH SAKIT UMUM DAERAH</h3>
                <h2 style="margin:0px; text-transform:uppercase;">SULTAN SURIANSYAH</h2>
                <p style="margin:0px; margin-top:3px">Jl. Rantauan Darat, Kelayan Sel., Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70234</p>
            </div>
            <br>
    </div>
    <hr style="margin-top:1px;">
    <hr style="margin-top:1px;">
    <div class="container">
        <div class="isi">
            <h2 style="text-align:center;">SEMUA DATA PEGAWAI</h2>
            
           
            <table id="dataTable" class="table text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>No Telpon</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @forelse ($karyawan as $item)
                    <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jabatan->nama_jabatan }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <img src="{{ url('uploads/images/'.$item->foto) }}" alt="" srcset="" style="height: 100px">
                            </td>
                        </tr>
                  
                          
                      @empty
                      <tr>
                          <td colspan="4">Tidak Ada Data Karyawan</td>
                      </tr>
                    @endforelse
                </tbody>
                        </table>
                     
                    </div>
             </div>
         </body>
</html>