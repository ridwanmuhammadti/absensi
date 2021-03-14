<?php

namespace App\Http\Controllers;

use App\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('backend.dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function absen(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::user()->id;
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $ket = $request->ket;
        

        $absen = new Absen;

       if ($request->btnIn == 'in') {
       
        $cek = $absen->where(['tanggal' => $date, 'user_id' => $user_id])->count();

        if ($cek > 0) {
            return redirect()->back()->with('toast_error', 'Anda Sudah Absen Masuk Hari ini');
        
        }

            $absen->create([
                'user_id' => $user_id,
                'tanggal' => $date,
                'time_in' => $time,
                'ket' => $ket,
            ]);

            return redirect()->back()->with('success','Anda Berhasil Absen Masuk');
        
       }   elseif ($request->btnOut == 'out') {

            $absen->where(['tanggal' => $date, 'user_id' => $user_id])
            ->update([
                'time_out' => $time,
                'ket' => $ket,
            ]);

            
            return redirect()->back()->with('success','Anda Berhasil Absen Keluar');
        }   


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }
}
