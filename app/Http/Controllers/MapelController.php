<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mapel;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $data_mapel = Mapel::all();
        return view('mapel.index', ['data_mapel' => $data_mapel]);
    }
    public function create(Request $request)
    {
        //insert ke tabel Siswa
        // $mapel = \App\Mapel::create($request->all());
        $kode_mapel = $request->input('kode_mapel');
        $nama_mapel = $request->input('nama_mapel');
        $kkm = $request->input('kkm');
        $grade = (100 - $kkm)/3;

        $mapel = new Mapel;
        $mapel->kode_mapel = $kode_mapel;
        $mapel->nama_mapel = $nama_mapel;
        $mapel->kkm = $kkm;
        $mapel->grade = $grade;
        $mapel->save();

        return redirect('/mapel')->with('Sukses','Data Berhasil Diinput.');
    }
    public function edit($id)
    {
        $mapel = \App\Mapel::find($id);
        return view('mapel/edit',['mapel' => $mapel]);
    }
    public function update(Request $request,$id)
    {
        $mapel = \App\Mapel::find($id);
        $mapel->update($request->all());
        return redirect('/mapel')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function delete($id)
    {
        $mapel = \App\Mapel::find($id);
        $mapel->delete($mapel);
        return redirect('/mapel')->with('Sukses','Data Berhasil Diupdate.');
    }
}
