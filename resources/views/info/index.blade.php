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
                                <h1 class="m-0 font-weight-bold text-primary">Data Informasi</h1>
                                </div>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"> <span class="btn btn-sm btn-primary"> Tambah Informasi</span></button>
                                </div>
                            </div>
							<div class="panel-body">
								<table class="table table-bordered">
									<thead>
										<tr class=" text-center" role="row">
                                            <th class="text-center">JUDUL</th>
                                            <th class="text-center">TANGGAL</th>
                                            <th class="text-center">ISI INFORMASI</th>
                                            <th class="text-center">OPSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data_info as $info)
                                        <tr class="text-center">
                                            <td>{{ $info->judul }}</td>
                                            <td>{{ $info->tanggal }}</td>
                                            <td>{{ $info->isi }}</td>
                                            <td>
                                                <a href="/info/{{$info->id}}/edit" class="btn btn-cirle btn-warning btn-sm">
                                                    <i class="fa fa-edit" ></i>
                                                </a>
                                                <a href="/info/{{$info->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Mau Hapus Data') ">
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/info/create" method="POST">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleFormControlInput1">Judul</label>
                <input name="judul" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Judul">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal</label>
                <input name="tanggal" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tanggal">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Isi Informasi</label>
                <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
    </div>
        <div class="modal-footer ">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
        </form>
    </div>
</div>
</div>
@endsection
