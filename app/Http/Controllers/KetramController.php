<?php

namespace App\Http\Controllers;

use App\Ketram;
use App\User;
use App\Siswa;
use App\Kelas;
use App\Mapel;
use App\Tahun;
use Excel;
use DB;
use Illuminate\Http\Request;

class KetramController extends Controller
{
    public function index(Request $request)
    {
        $pilihtahun = Tahun::groupBy('tahun_pel')->get();
        $pilsiswa = Siswa::all();
        $data_ketram = Ketram::all();
        $pilmapel = Mapel::all();
        return view('nilai.keterampilan', compact('data_ketram','pilihtahun', 'pilsiswa','pilmapel'));
    }
    public function cek_nilai(Request $request)
    {
        dd($request);
        // $nilai_ketram = Ketram::all();
        // $pilihtahun = Tahun::all();
        // $pilsiswa = Siswa::all();
        // return view('nilai.keterampilan', compact('nilai_ketram','pilihtahun', 'pilsiswa'));
    }
    public function create(Request $request)
    {
        //insert ke tabel Siswa
        $ketram = \App\Ketram::create($request->all());
        return redirect('/ketram')->with('Sukses','Data Berhasil Diinput.');
    }
    public function edit($id)
    {
        $ketram = \App\Ketram::find($id);
        return view('ketram/edit',['ketram' => $ketram]);
    }
    public function update(Request $request,$id)
    {
        $ketram = \App\Ketram::find($id);
        $ketram->update($request->all());
        return redirect('/ketram')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function ketram($id)
    {
        $ketram = Ketram::where('tahun_id', $id)->pluck("semester", "id");
        return json_encode($ketram);
    }
}
