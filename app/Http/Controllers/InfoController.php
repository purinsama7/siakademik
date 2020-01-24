<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;

class InfoController extends Controller
{
    public function index(Request $request)
    {
        $data_info = Info::all();
        return view('info.index', ['data_info' => $data_info]);
    }
    public function create(Request $request)
    {
        //insert ke tabel info
        $info = \App\Info::create($request->all());
        return redirect('/info')->with('Sukses','Data Berhasil Diinput.');
    }
    public function edit($id)
    {
        $info = \App\Info::find($id);
        return view('info/edit',['info' => $info]);
    }
    public function update(Request $request,$id)
    {
        $info = \App\Info::find($id);
        $info->update($request->all());
        return redirect('/info')->with('Sukses','Data Berhasil Diupdate.');
    }
    public function delete($id)
    {
        $info = \App\Info::find($id);
        $info->delete($info);
        return redirect('/info')->with('Sukses','Data Berhasil Diupdate.');
    }
}
