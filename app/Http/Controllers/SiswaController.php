<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;
use App\kelas;
use DB;
use PDF;
use App\Imports\SiswaImport;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_siswa = \App\Siswa::where('nama_depan','like',"%".$request->cari."%")->get();
        }else{
            $data_siswa = Siswa::all();
        }
        $pilihkelas = \App\Kelas::all();
        return view('siswa.index', compact('data_siswa', 'pilihkelas'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_depan' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'mimes:jpg,png,jpeg|max:2048',
        ]);
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke tabel siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = \App\Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data Berhasil Di Input!');
    }
    public function edit($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('siswa/edit',['siswa' => $siswa,]);
    }
    public function update(Request $request,$id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function profile($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('siswa.profile', ['siswa' => $siswa]);
    }

    public function cetak_pdf()
    {
        $data = Siswa::get();
        $pdf = PDF::loadView('siswa.export_siswa', compact('data'))->setPaper('a4', 'landscape');

        return $pdf->download('data-siswa.pdf');
    }

    public function export_excel()
	{
        return Excel::download(new SiswaExport, 'data-siswa.xlsx');
    }
    public function import_excel(Request $request)
	{
		Excel::import(new SiswaImport, $request->file('data-siswa'));
    }


}
