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
                                <h1 class="m-0 font-weight-bold text-primary">Data Kelas</h1>
                                </div>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"> <span class="btn btn-sm btn-primary"> Tambah Kelas</span></button>
                                </div>
                            </div>
							<div class="panel-body">
								<table class="table table-bordered">
									<thead>
										<tr class=" text-center" role="row">
                                            <th class="text-center">KODE MAPEL</th>
                                            <th class="text-center">MATA PELAJARAN</th>
                                            <th class="text-center">KKM</th>
                                            <th class="text-center">GRADE</th>
                                            <th class="text-center">OPSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data_mapel as $mapel)
                                        <tr class="text-center">
                                            <td>{{ $mapel->kode_mapel }}</td>
                                            <td>{{ $mapel->nama_mapel }}</td>
                                            <td>{{ $mapel->kkm }}</td>
                                            <td>{{ $mapel->grade }}</td>
                                            <td>
                                                <a href="/mapel/{{$mapel->id}}/edit" class="btn btn-cirle btn-warning btn-sm">
                                                    <i class="fa fa-edit" ></i>
                                                </a>
                                                <a href="/mapel/{{$mapel->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Mau Hapus Data') ">
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/mapel/create" method="POST">
                {{ csrf_field() }}
            <div class="form-group ">
                <label for="exampleFormControlInput1">Kode Mapel</label>
                <input name="kode_mapel" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kode Mapel">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">Mata Pelajaran</label>
            <input name="nama_mapel" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mata Pelajaran">
        </div>
        <div class="form-group col-md-12">
            <label for="exampleFormControlTextarea1">KKM</label>
            <input name="kkm" type="number" class="form-control" id="exampleFormControlInput1" placeholder="KKM">
        </div>
        <div class="modal-footer col-1">
            <br/>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            <br/>
        </div>
    </div>
        </form>
    </div>
</div>
</div>
@endsection
