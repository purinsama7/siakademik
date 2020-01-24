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
                                <h1 class="m-0 font-weight-bold text-primary">Data Tahun</h1>
                                </div>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"> <span class="btn btn-sm btn-primary"> Tambah Tahun</span></button>
                                </div>
                            </div>
							<div class="panel-body">
								<table class="table table-bordered">
									<thead>
										<tr class=" text-center" role="row">
                                            <th class="text-center">TAHUN PELJARAN</th>
                                            <th class="text-center">SEMESTER</th>
                                            <th class="text-center">OPSI</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data_tahun as $tahun)
                                        <tr class="text-center">
                                            <td>{{ $tahun->tahun_pel }}</td>
                                            <td>{{ $tahun->semester }}</td>
                                            <td>
                                                <a href="/tahun/{{$tahun->id}}/edit" class="btn btn-cirle btn-warning btn-sm">
                                                    <i class="fa fa-edit" ></i>
                                                </a>
                                                <a href="/tahun/{{$tahun->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Mau Hapus Data') ">
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/tahun/create" method="POST">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleFormControlInput1">Tahun Pelajaran</label>
                <input name="tahun_pel" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tahun Pelajaran">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Semester</label>
                <input name="semester" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Semester">
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
