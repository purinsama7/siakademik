<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kepsek;
use Illuminate\Support\Str;

class KepsekController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_kepsek = \App\Kepsek::where('nama_depan','like',"%".$request->cari."%")->get();
        }else{
            $data_kepsek = Kepsek::all();
        }
        return view('kepsek.index', ['data_kepsek' => $data_kepsek]);
    }
    public function create(Request $request)
    {
        //insert ke tabel Users
        $user = new \App\User;
        $user->role = 'kepsek';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke tabel kepsek
        $request->request->add(['user_id' => $user->id]);
        $kepsek = \App\Kepsek::create($request->all());
        return redirect('/kepsek')->with('Sukses','Data Berhasil Diinput.');
    }
    public function edit($id)
    {
        $kepsek = \App\Kepsek::find($id);
        return view('kepsek/edit',['kepsek' => $kepsek]);
    }
    public function update(Request $request,$id)
    {
        $kepsek = \App\Kepsek::find($id);
        $kepsek->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $kepsek->avatar = $request->file('avatar')->getClientOriginalName();
            $kepsek->save();
        }
        return redirect('/kepsek')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function delete($id)
    {
        $kepsek = \App\Kepsek::find($id);
        $kepsek->delete($kepsek);
        return redirect('/kepsek')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function profile($id)
    {
        $kepsek = \App\Kepsek::find($id);
        return view('kepsek.profile', ['kepsek' => $kepsek]);
    }
}
