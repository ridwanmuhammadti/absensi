<?php

namespace App\Http\Controllers;

use App\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $absen = Absen::where('user_id', $user_id)->orderByDesc('created_at')->get();
        $date = date("Y-m-d");
        $cek = Absen::where(['user_id' => $user_id, 'tanggal' => $date])->get()->first();

        if (is_null($cek)){
            $info = array(
                "status" => "Anda Belum Melakukan Absen",
                "btnIn" => "",
                "btnOut" => "disabled",
            );
        } elseif ($cek->time_out == null){
            $info = array(
                "status" => "Jangan Lupa Absen Pulang",
                "btnIn" => "disabled",
                "btnOut" => "",
            );
        } else {
            $info = array(
                "status" => "Selamat Beristirahat dirumah, Semoga Kerjanya berkah",
                "btnIn" => "disabled",
                "btnOut" => "disabled",
            );
        }

        return view('backend.dashboard.index',compact('absen','info'));
    }
}
