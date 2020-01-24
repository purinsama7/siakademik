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
                            <form action="/info/{{$info->id}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Judul</label>
                                <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="informasi" value="{{ $info->judul }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Tanggal</label>
                                <input name="tanggal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tanggal" value="{{ $info->tanggal }}" >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Isi Informasi</label>
                                <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$info->isi}}</textarea>
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
