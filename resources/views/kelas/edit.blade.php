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
                            <form action="/kelas/{{$kelas->id}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Kelas</label>
                                <input name="nama_kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas" value="{{ $kelas->nama_kelas }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Walikelas</label>
                                <input name="walikelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="walikelas" value="{{ $kelas->walikelas }}" >
                            </div>
                            <br/>
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
