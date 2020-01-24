@extends('layout.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Inputs</h3>
							</div>
                        <div class="panel-body">
                            <form action="/tu/{{$tu->id}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group col-md-12 ">
                                <label for="exampleInputEmail1">NIP</label>
                                <input name="nip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NIP" value="{{ $tu->nip }}" >
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="exampleFormControlInput1">Nama Depan</label>
                                <input name="nama_depan" type="text" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$tu->nama_depan}}" >
                                </div>
                                <div class="form-group col-md-6">
                                <label for="exampleFormControlInput4">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control" id="exampleFormControlInput4" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$tu->nama_belakang}}" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="exampleFormControinputCity">Tempat Lahir</label>
                                <input name="tanggal_lahir" type="text" class="form-control" data-toggle="tanggal" value="{{$tu->tempat_lahir}}" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                    <input name="tanggal_lahir" type="text" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="30/01/2004" value="{{$tu->tanggal_lahir}}" >
                                </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControinputState">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="exampleFormControinputState" class="form-control" value="{{$tu->jenis_kelamin}}">
                                    <option value="Laki-laki"  @if($tu->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                    <option value="Perempuan"  @if($tu->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="exampleFormControlInput1">Agama</label>
                                <input name="agama" type="text" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="Masukkan Agama" value="{{$tu->agama}}">
                            </div>
                            </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$tu->alamat}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea1">Avatar</label>
                                    <input name="avatar" type="file" class="form-control">
                                </div>
                            </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                            </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
