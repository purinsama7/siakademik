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
        $pilihtahun = Tahun::groupBy('tahun_pel')->get();
        $pilsiswa = Siswa::all();
        $data_nilai = Nilai::all();
        $pilmapel = Mapel::all();
        return view('nilai.index', compact('data_nilai','pilihtahun', 'pilsiswa','pilmapel'));
    }

    public function getNilai(Request $request)
    {
        $tahun = $request->input('tahun');
        $semester = $request->input('semester');
        $pilihtahun = Tahun::groupBy('tahun_pel')->get();
        $pilsiswa = Siswa::all();
        $pilmapel = Mapel::all();
        $data_nilai = Nilai::where('tahun_id', $tahun)->where('tahun_semester', $semester)->get();
        return view('nilai.index', compact('data_nilai','pilihtahun', 'pilsiswa','pilmapel'));
    }

    public function create(Request $request)
    {
        if($request->input('uh1') === null){
            $pembagi = 1;
        }elseif($request->input('uh2') === null){
            $pembagi = 2;
        }elseif($request->input('uh3') === null){
            $pembagi = 3;
        }elseif($request->input('uh4') === null){
            $pembagi = 4;
        }elseif($request->input('uh5') === null){
            $pembagi = 5;
        }elseif($request->input('uh6') === null){
            $pembagi = 6;
        }elseif($request->input('uh7') === null){
            $pembagi = 7;
        }elseif($request->input('uh8') === null){
            $pembagi = 8;
        }elseif($request->input('uh9') === null){
            $pembagi = 9;
        }elseif($request->input('uh10') === null){
            $pembagi = 10;
        }elseif($request->input('uh11') === null){
            $pembagi = 11;
        }

        $total = 
            $request->input('uh1') + 
            $request->input('uh2') + 
            $request->input('uh3') + 
            $request->input('uh4') + 
            $request->input('uh5') + 
            $request->input('uh6') + 
            $request->input('uh7') + 
            $request->input('uh8') +
            $request->input('uh9') + 
            $request->input('uh10') + 
            $request->input('uh11');

        $rataUh = $total/$pembagi;

        $pilihtahun = explode(",", $request->input('tahun'));
        dd($pilihtahun[0]);
        $nilai = new Nilai;
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->siswa_id = $request->input('siswa_id');
        //insert ke tabel Siswa
        // $nilai = \App\Nilai::create($request->all());
        // return redirect('/nilai')->with('Sukses','Data Berhasil Diinput.');
    }
    public function edit($id)
    {
        $nilai = \App\Nilai::find($id);
        return view('nilai/edit', compact('nilai'));
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
