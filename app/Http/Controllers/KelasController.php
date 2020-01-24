<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
Use Excel;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $data_kelas = Kelas::all();
        return view('kelas.index', ['data_kelas' => $data_kelas]);
    }
    public function create(Request $request)
    {
        //insert ke tabel kelas
        $kelas = \App\Kelas::create($request->all());
        return redirect('/kelas')->with('Sukses','Data Berhasil Diinput.');
    }
    public function edit($id)
    {
        $kelas = \App\Kelas::find($id);
        return view('kelas/edit',['kelas' => $kelas]);
    }
    public function update(Request $request,$id)
    {
        $kelas = \App\Kelas::find($id);
        $kelas->update($request->all());
        return redirect('/kelas')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function delete($id)
    {
        $kelas = \App\Kelas::find($id);
        $kelas->delete($kelas);
        return redirect('/kelas')->with('Sukses','Data Berhasil Diupdate.');
    }
}
