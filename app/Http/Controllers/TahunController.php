<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tahun;

class TahunController extends Controller
{
    public function index(Request $request)
    {
        $data_tahun = Tahun::all();
        return view('tahun.index', ['data_tahun' => $data_tahun]);
    }
    public function create(Request $request)
    {
        //insert ke tabel tahun
        $tahun = \App\Tahun::create($request->all());
        return redirect('/tahun')->with('Sukses','Data Berhasil Diinput.');
    }
    public function edit($id)
    {
        $tahun = \App\Tahun::find($id);
        return view('tahun/edit',['tahun' => $tahun]);
    }
    public function update(Request $request,$id)
    {
        $tahun = \App\Tahun::find($id);
        $tahun->update($request->all());
        return redirect('/tahun')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function delete($id)
    {
        $tahun = \App\Tahun::find($id);
        $tahun->delete($tahun);
        return redirect('/tahun')->with('Sukses','Data Berhasil Diupdate.');
    }
}
