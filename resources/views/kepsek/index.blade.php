@extends('layout.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
							<div class="panel-heading">
                                <div class="card-header py-3">
                                <h1 class="m-0 font-weight-bold text-primary">Data Kepala Sekolah</h1>
                                </div>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"> <span class="btn btn-sm btn-primary"> Tambah Kepala Sekolah</span></button>
                                </div>
                            </div>
							<div class="panel-body">
								<table id="example" class="table table-bordered">
									<thead>
										<tr class=" text-center" role="row">
                                            <th class="text-center">NIP</th>
                                            <th class="sorting_asc text-center" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending" style="width: 120px;" aria-sort="ascending">NAMA DEPAN</th>
                                            <th class="text-center">NAMA BELAKANG</th>
                                            <th class="text-center">TEMPAT LAHIR</th>
                                            <th class="text-center">TANGGAL LAHIR</th>
                                            <th class="text-center">JENIS KELAMIN</th>
                                            <th class="text-center">AGAMA</th>
                                            <th class="text-center">ALAMAT</th>
                                            <th class="text-center">OPSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data_kepsek as $kepsek)
                                        <tr class="text-center">
                                            <td>{{ $kepsek->nip }}</td>
                                            <td>{{ $kepsek->nama_depan }}</td>
                                            <td>{{ $kepsek->nama_belakang }}</td>
                                            <td>{{ $kepsek->tempat_lahir }}</td>
                                            <td>{{ $kepsek->tanggal_lahir }}</td>
                                            <td>{{ $kepsek->jenis_kelamin }}</td>
                                            <td>{{ $kepsek->agama }}</td>
                                            <td>{{ $kepsek->alamat }}</td>
                                            <td>
                                                <a href="/kepsek/{{$kepsek->id}}/edit" class="btn btn-cirle btn-warning btn-sm">
                                                    <i class="fa fa-edit" ></i>
                                                </a>
                                                <a href="/kepsek/{{$kepsek->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Mau Hapus Data') ">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kepala Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kepsek/create" method="POST">
                    {{ csrf_field() }}
                <div class="form-group col-sm-12">
                    <label for="exampleFormControlInput1">NIP</label>
                    <input name="nip" type="text" class="form-control" id="exampleFormControlInput1" placeholder="NIP">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Nama Depan</label>
                    <input name="nama_depan" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Depan">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="exampleFormControlInput4">Nama Belakang</label>
                    <input name="nama_belakang" type="text" class="form-control" id="exampleFormControlInput4" placeholder="Nama Belakang">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="exampleFormControinputCity">Tempat Lahir</label>
                    <input name="tempat_lahir" type="text" class="form-control" id="exampleFormControinputCity" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="exampleFormControlInput1">Tanggal Lahir</label>
                        <input name="tanggal_lahir" type="text" class="form-control" data-toggle="tanggal">
                    </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControinputState">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleFormControinputState">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="exampleFormControlInput1">Agama</label>
                    <input name="agama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Agama">
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="exampleFormControlTextarea1">Email</label>
                <input name="email" type="emaik" class="form-control" id="exampleFormControlInput1" placeholder="masukkan_email@gmail.com">
            </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
            </form>
        </div>
    </div>
    </div>
@endsection
