<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Mapel;
use App\Tahun;
use Excel;
use DB;

class NilaiController extends Controller
{
    //
    public function index(Request $request)
    {
        $pilihtahun = Tahun::all();
        $pilsiswa = Siswa::all();
        $data_nilai = Nilai::all();
        return view('nilai.index', compact('data_nilai','pilihtahun', 'pilsiswa'));
    }
    public function create(Request $request)
    {
        //insert ke tabel Siswa
        $nilai = \App\Nilai::create($request->all());
        return redirect('/nilai')->with('Sukses','Data Berhasil Diinput.');
    }
    public function edit($id)
    {
        $nilai = \App\Nilai::find($id);
        return view('nilai/edit',['nilai' => $nilai]);
    }
    public function update(Request $request,$id)
    {
        $nilai = \App\Nilai::find($id);
        $nilai->update($request->all());
        return redirect('/nilai')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function nilai($id)
    {
        $nilai = Nilai::where('tahun_id', $id)->pluck("semester", "id");
        return json_encode($nilai);
    }
}
