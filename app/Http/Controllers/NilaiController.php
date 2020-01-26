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

        $pilihmapel = explode(",", $request->input('mapel_id'));
        $pilihtahun = explode(",", $request->input('tahun'));

        $rataUh = $total/$pembagi;
        $rataTotal = (($rataUh * 2) + $request->input('uts') + $request->input('uas'))/4;
        $gradeAngka = $rataTotal + $pilihmapel[1];

        if($gradeAngka >= 1 && $gradeAngka <= 80){
            $gradeHuruf = 'C';
        }elseif($gradeAngka >= 81 && $gradeAngka <= 90){
            $gradeHuruf = 'B';
        }elseif($gradeAngka >= 91 && $gradeAngka <= 100){
            $gradeHuruf = 'A';
        }else{
            $gradeHuruf = '-';
        }

        $nilai = new Nilai;
        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->mapel_id = $pilihmapel[0];
        $nilai->tahun_id = $pilihtahun[0];
        $nilai->tahun_tahun_pel = $pilihtahun[1];
        $nilai->tahun_semester = $request->input('semester');
        $nilai->uh1 = $request->input('uh1');
        $nilai->uh2 = $request->input('uh2');
        $nilai->uh3 = $request->input('uh3');
        $nilai->uh4 = $request->input('uh4');
        $nilai->uh5 = $request->input('uh5');
        $nilai->uh6 = $request->input('uh6');
        $nilai->uh7 = $request->input('uh7');
        $nilai->uh8 = $request->input('uh8');
        $nilai->uh9 = $request->input('uh9');
        $nilai->uh10 = $request->input('uh10');
        $nilai->uh11 = $request->input('uh11');
        $nilai->rataUh = $rataUh;
        $nilai->uts = $request->input('uts');
        $nilai->uas = $request->input('uas');
        $nilai->rataTotal = $rataTotal;
        $nilai->grade = $gradeHuruf;
        //insert ke tabel Siswa
        $nilai->save();
        
        return redirect('/nilai')->with('Sukses','Data Berhasil Diinput.');
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
