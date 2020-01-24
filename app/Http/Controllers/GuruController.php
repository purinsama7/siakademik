<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\User;
use PDF;
use App\Imports\GuruImport;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_guru = \App\Guru::where('nama_depan','like',"%".$request->cari."%")->get();
        }else{
            $data_guru = Guru::all();
        }
        return view('guru.index', ['data_guru' => $data_guru]);
    }
    public function create(Request $request)
    {
        //insert ke tabel Users
        $user = new \App\User;
        $user->role = 'guru';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke tabel guru
        $request->request->add(['user_id' => $user->id]);
        $guru = \App\Guru::create($request->all());
        return redirect('/guru')->with('Sukses','Data Berhasil Diinput.');
    }
    public function edit($id)
    {
        $guru = \App\Guru::find($id);
        return view('guru/edit',['guru' => $guru]);
    }
    public function update(Request $request,$id)
    {
        $guru = \App\Guru::find($id);
        $guru->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }
        return redirect('/guru')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function delete($id)
    {
        $guru = \App\Guru::find($id);
        $guru->delete($guru);
        return redirect('/guru')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function profile($id)
    {
        $guru = \App\Guru::find($id);
        return view('guru.profile', ['guru' => $guru]);
    }
    public function cetak_pdf()
    {
        $data = Guru::get();
        $pdf = PDF::loadView('guru.export_guru', compact('data'))->setPaper('a4', 'landscape');;

        return $pdf->download('data-guru.pdf');
    }

    public function export_excel()
	{
		return Excel::download(new GuruExport(), 'data-guru.xlsx');
    }
    public function import_excel(Request $request)
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_guru',$nama_file);

		// import data
		Excel::import(new GuruImport, public_path('/file_guru/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Guru Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/guru');
	}

}
