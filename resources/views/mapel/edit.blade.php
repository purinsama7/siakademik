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
                            <form action="/mapel/{{$mapel->id}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Kode Mapel</label>
                                <input name="kode_mapel" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kode Mapel" value="{{ $mapel->kode_mapel }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mata Pelajaran</label>
                                <input name="nama_mapel" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Mapel" value="{{ $mapel->nama_mapel }}" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">KKM</label>
                                <input name="kkm" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Mapel" value="{{ $mapel->kkm }}" >
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
