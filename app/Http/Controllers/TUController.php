<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\TU;

class TUController extends Controller
{
    //
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_tu = \App\TU::where('nama_depan','like',"%".$request->cari."%")->get();
        }else{
            $data_tu = TU::all();
        }
        return view('tu.index', ['data_tu' => $data_tu]);
    }
    public function create(Request $request)
    {
        //insert ke tabel Users
        $user = new \App\User;
        $user->role = 'tu';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke tabel tu
        $request->request->add(['user_id' => $user->id]);
        $tu = \App\TU::create($request->all());
        return redirect('/tu')->with('Sukses','Data Berhasil Diinput.');
    }
    public function edit($id)
    {
        $tu = \App\TU::find($id);
        return view('tu/edit',['tu' => $tu]);
    }
    public function update(Request $request,$id)
    {
        $tu = \App\TU::find($id);
        $tu->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $tu->avatar = $request->file('avatar')->getClientOriginalName();
            $tu->save();
        }
        return redirect('/tu')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function delete($id)
    {
        $tu = \App\TU::find($id);
        $tu->delete($tu);
        return redirect('/tu')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function profile($id)
    {
        $tu = \App\TU::find($id);
        return view('tu.profile', ['tu' => $tu]);
    }
}
