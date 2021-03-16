<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Pegawai;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function absendaynow()
    {
        
        $tgl= Carbon::now()->format('d-m-Y');
        $date = date("Y-m-d");
        $absenNow = Absen::where('tanggal', $date)->get();
        return PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.report.daynow',compact('absenNow','tgl'))->setPaper('a4', 'potrait')->stream('Laporan Data pelanggaran.pdf');
        
    }

    public function pegawaiAll()
    {
        $karyawan = Pegawai::all();
        return PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.report.karyawanAll',compact('karyawan'))->setPaper('a4', 'potrait')->stream('Laporan Data pegawai.pdf');
      
    }

    public function pegawaiKartu($uuid)
    {
        $data = Pegawai::where('uuid',$uuid)->first();
        return PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.report.Kartu',compact('data'))->setPaper('a4', 'landscape')->stream('Kartu pegawai.pdf');
      
    }
}
