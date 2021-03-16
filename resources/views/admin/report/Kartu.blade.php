<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

.container {
  position: relative;
  text-align: center;
  /* color: white; */
}

/* Bottom left text */
.nama {
  position: absolute;
  bottom: 440px;
  left: 150px;
  text-transform: uppercase;
  font-size: 40px;
}

/* Top left text */
.nis {
    position: absolute;
  bottom:340px;
  left: 150px;
  text-transform: uppercase;
  font-size: 40px;
}

/* Top right text */
.agama {
    position: absolute;
  bottom:240px;
  left: 150px;
  text-transform: uppercase;
  font-size: 40px;
}

/* Bottom right text */
.alamat {
    position: absolute;
  bottom:140px;
  left: 150px;
  text-transform: uppercase;
  font-size: 40px;
}
.foto {
  position: absolute;
  bottom:280px;
  left: 830px;
}



</style>
<body>
    <div class="container">
       
        <img src="{{ url('backend/logo/bg-kartu.png') }}" style="margin-top: -45px;
		" alt="" srcset="">
        <div class="nama">{{ $data->nama }}</div>
        <div class="nis">{{ $data->nip }}</div>
      <div class="agama">{{ $data->jabatan->nama_jabatan }}</div>
        <div class="alamat">{{ $data->no_hp }}</div>
        <div class="alamat">{{ $data->alamat }}</div>
        <div class="foto">
          <img  src="{{ url('/uploads/images/'.$data->foto) }}" style="height:200px;" srcset=""></div>
      
    </div>
</body>
</html>