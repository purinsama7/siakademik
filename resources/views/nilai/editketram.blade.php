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
                            <form action="/ketram/{{$nilai->id}}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Siswa </label>
                                    <input name="{{$nilai->siswa->id}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" " value="{{ $nilai->siswa->nama_depan }}" >
                                </div>
                                <div class="form-group ">
                                    <label for="exampleInputEmail1">Mata Pelajaran </label>
                                    <input name="{{$nilai->mapel->id}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" " value="{{ $nilai->mapel->nama_mapel}}" >
                                </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 1 </label>
                                <input name="uh1" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 1" value="{{ $nilai->uh1 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 2</label>
                                <input name="uh2" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 2" value="{{ $nilai->uh2 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 3 </label>
                                <input name="uh3" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 3" value="{{ $nilai->uh3 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 4</label>
                                <input name="uh4" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 4" value="{{ $nilai->uh4 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 5 </label>
                                <input name="uh5" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 5" value="{{ $nilai->uh5 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 6</label>
                                <input name="uh6" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 6" value="{{ $nilai->uh6 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 7 </label>
                                <input name="uh7" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 7" value="{{ $nilai->uh7 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 8</label>
                                <input name="uh8" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 8" value="{{ $nilai->uh8 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 9 </label>
                                <input name="uh9" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 9" value="{{ $nilai->uh9 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 10</label>
                                <input name="uh10" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 10" value="{{ $nilai->uh10 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UH 11 </label>
                                <input name="uh11" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UH 11" value="{{ $nilai->uh11 }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UTS</label>
                                <input name="uts" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UTS" value="{{ $nilai->uts }}" >
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">UAS</label>
                                <input name="uas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="UAS" value="{{ $nilai->uas }}" >
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
