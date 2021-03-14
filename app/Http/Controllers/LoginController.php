<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function postlogin(Request $request)
    {
        // dd($request->all());
       if(Auth::attempt($request->only('email','password'))){
           return redirect('/dashboard');
       }

       return redirect('/login')->with('toast_error', 'email atau password salah');

    }

    public function edit($uuid)
    {
        $data = User::where('uuid', $uuid)->first();
        return view('admin.pegawai.ganti',compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        // dd($request->all());
        $this->validate($request, [

            'password' => 'required|min:8',
            'new_password' => 'min:8|different:password',
        ]);
        $data = $request->all();
        // dd($data);
        $user = auth()->user();
        if (!Hash::check($data['password'], $user->password)) {
            return back()->with('toast_error', 'Password lama salah');
        } else {
            // write code to update password

            $user->update([

                'password' => bcrypt($request->new_password),
            ]);
            return redirect('/dashboard')->with('success','Password Berhasil diganti');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    
}
