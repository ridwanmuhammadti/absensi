<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Pegawai;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        $pegawai = Pegawai::all();
        return view('admin.pegawai.index',compact('pegawai','jabatan'));
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
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'nip' => 'required|min:3|unique:pegawais,nip',
            'email' => 'required|email|unique:pegawais,email',
            'jk' => 'required',
            'jabatan_id' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:jpeg,png|max:512'
        ]);
    
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $user = new User;
        $user->role = 2;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('12345678');
        $user->remember_token = Str::random(50);
        $user->save();

        $data = new Pegawai;
        $data->user_id = $user->id;
        $data->nip = $request->nip;
        $data->email = $request->email;
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        $data->jk = $request->jk;
        $data->jabatan_id = $request->jabatan_id;

        if($request->hasFile('foto')){
           
            $file = $request->file('foto');
            $FotoExt = $file->getClientOriginalExtension();
            $name = time().'-'.date('Y-m-d').'-'.'.'.$FotoExt;
            $to = 'uploads/images';
            $file->move($to, $name);
            $data->foto = $name;
            // dd($data->foto);
            $data->save();
        }

        
        $data->save();

        return redirect('/pegawai')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $pegawai = Pegawai::where('uuid', $uuid)->first();
        return view('admin.pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $jabatan = Jabatan::all();
        $data = Pegawai::where('uuid', $uuid)->first();
        return view('admin.pegawai.edit', compact('data','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'nip' => 'required|min:3|',
            'email' => 'required|email',
            'jk' => 'required',
            'jabatan_id' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto' => 'mimes:jpeg,png|max:512'
        ]);
    
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // $user = new User;
        // $user->role = 2;
        // $user->nama = $request->nama;
        // $user->email = $request->email;
        // $user->password = bcrypt('12345678');
        // $user->remember_token = Str::random(50);
        // $user->save();

        $data = Pegawai::where('uuid', $uuid)->first();
        // $data->user_id = $user->id;
        $data->nip = $request->nip;
        $data->email = $request->email;
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        $data->jk = $request->jk;
        $data->jabatan_id = $request->jabatan_id;

        if($request->hasFile('foto')){
           
            $file = $request->file('foto');
            $FotoExt = $file->getClientOriginalExtension();
            $name = time().'-'.date('Y-m-d').'-'.'.'.$FotoExt;
            $to = 'uploads/images';
            $file->move($to, $name);
            $data->foto = $name;
            // dd($data->foto);
            $data->update();
        }

        
        $data->update();

        return redirect('/pegawai/'.$uuid.'/show')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
