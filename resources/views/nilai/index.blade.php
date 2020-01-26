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
                                <h1 class="m-0 font-weight-bold text-primary">Data Nilai Pengetahuan</h1>
                                </div>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"> <span class="btn btn-sm btn-primary"> Tambah Tahun</span></button>
                                </div>
                            </div>
                            <form method="POST" action="/nilai/get-nilai">
                                {{ csrf_field() }}
                                <div class="col-sm-3">
                                    <select class="form-control" name="tahun" id="tahun">
                                        @foreach ($pilihtahun as $tahun)
                                            <option value="{{$tahun->id}}">{{$tahun->tahun_pel}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="semester" id="semester">
                                        <option value="ganjil">Ganjil</option>
                                        <option value="genap">Genap</option>
                                        </select>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-primary rounded" type="submit" id="search" name="search"> Cari  <i class="fa fa-search"></i></button>
                                </div>
                            </form>
                            <br/>
							<div class="panel-body">
                                <hr/>
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered">
                                        <thead>
                                            <tr class=" text-center" role="row">
                                                <th class="text-center">Mata Pelajaran</th>
                                                <th class="text-center">NAMA SISWA</th>
                                                <th class="text-center">TAHUN AJAR</th>
                                                <th class="text-center">SEMESTER</th>
                                                <th class="text-center">UH1</th>
                                                <th class="text-center">UH2</th>
                                                <th class="text-center">UH3</th>
                                                <th class="text-center">UH4</th>
                                                <th class="text-center">UH5</th>
                                                <th class="text-center">UH6</th>
                                                <th class="text-center">UH7</th>
                                                <th class="text-center">UH8</th>
                                                <th class="text-center">UH9</th>
                                                <th class="text-center">UH10</th>
                                                <th class="text-center">UH11</th>
                                                <th class="text-center">UTS</th>
                                                <th class="text-center">UAS</th>
                                                <th class="text-center">OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_nilai as $nilai)
                                            <tr class="text-center">
                                                <td>{{ $nilai->mapel->nama_mapel }}</td>
                                                <td>{{ $nilai->siswa->nama_depan }}</td>
                                                <td>{{ $nilai->tahun_tahun_pel }}</td>
                                                <td>{{ $nilai->tahun_semester }}</td>
                                                <td>{{ $nilai->uh1 }}</td>
                                                <td>{{ $nilai->uh2 }}</td>
                                                <td>{{ $nilai->uh3 }}</td>
                                                <td>{{ $nilai->uh4 }}</td>
                                                <td>{{ $nilai->uh5 }}</td>
                                                <td>{{ $nilai->uh6 }}</td>
                                                <td>{{ $nilai->uh7 }}</td>
                                                <td>{{ $nilai->uh8 }}</td>
                                                <td>{{ $nilai->uh9 }}</td>
                                                <td>{{ $nilai->uh10 }}</td>
                                                <td>{{ $nilai->uh11 }}</td>
                                                <td>{{ $nilai->uts }}</td>
                                                <td>{{ $nilai->uas }}</td>
                                                <td>
                                                    <a href="/nilai/{{$nilai->id}}/edit" class="btn btn-cirle btn-warning btn-sm">
                                                        <i class="fa fa-edit" ></i>
                                                    </a>
                                                    <a href="/nilai/{{$nilai->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Mau Hapus Data') ">
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
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Pengetahuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/nilai/create" method="POST">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControinputState">SISWA</label>
                        <select class="form-control" id="siswa" name="siswa_id">
                            @foreach ($pilsiswa as $siswa)
                        <option value="{{$siswa->id}}">{{$siswa->nama_depan}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">MAPEL</label>
                    <select class="form-control" id="mapel" name="mapel_id">
                        @foreach ($pilmapel as $mapel)
                    <option value="{{$mapel->id}}">{{$mapel->nama_mapel}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="exampleFormControlInput4">Tahun</label>
                        <select name="tahun_tahun_pel" class="form-control" id="exampleFormControinputState">
                            <option value="2017/2018">2017/2018</option>
                            <option value="2018/2019">2018/2019</option>
                            <option value="2019/2020">2019/2020</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput4">Semester</label>
                        <select name="tahun_semester" class="form-control" id="exampleFormControinputState">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                        </div>
                </div>
             <div class="form-row">
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">UH 1</label>
                <input name="uh1" type="text" class="form-control" id="exampleFormControlInput1" placeholder="UH 1">
                </div>
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput4">UH 2</label>
                <input name="uh2" type="text" class="form-control" id="exampleFormControlInput4" placeholder="UH 2">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">UH 3</label>
                <input name="uh3" type="text" class="form-control" id="exampleFormControlInput1" placeholder="UH 3">
                </div>
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput4">UH 4</label>
                <input name="uh4" type="text" class="form-control" id="exampleFormControlInput4" placeholder="UH 4">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">UH 5</label>
                <input name="uh5" type="text" class="form-control" id="exampleFormControlInput1" placeholder="UH 5">
                </div>
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput4">UH 6</label>
                <input name="uh6" type="text" class="form-control" id="exampleFormControlInput4" placeholder="UH 6">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">UH 7</label>
                <input name="uh7" type="text" class="form-control" id="exampleFormControlInput1" placeholder="UH 7">
                </div>
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput4">UH 8</label>
                <input name="uh8" type="text" class="form-control" id="exampleFormControlInput4" placeholder="UH 8">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">UH 9</label>
                <input name="uh9" type="text" class="form-control" id="exampleFormControlInput1" placeholder="UH 9">
                </div>
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput4">UH 10</label>
                <input name="uh10" type="text" class="form-control" id="exampleFormControlInput4" placeholder="UH 10">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">UH 11</label>
                <input name="uh11" type="text" class="form-control" id="exampleFormControlInput1" placeholder="UH 11">
                </div>
                <div class="form-group col-md-6">
                <label for="exampleFormControlInput4">UTS</label>
                <input name="uts" type="text" class="form-control" id="exampleFormControlInput4" placeholder="UTS">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput4">UAS</label>
                    <input name="uas" type="text" class="form-control" id="exampleFormControlInput4" placeholder="UAS">
                    </div>
            </div>
        </div>
        <br/>
        <div class="modal-footer ">
            <br/>
            <hr/>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
        </form>
    </div>
</div>
</div>
@endsection
@section('footer_skrip')
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('select[name="tahun"]').on('change', function(){
        var tahunID = jQuery(this).val();
        if(tahunID){
            jQuery.ajax({
                url: '/nilai/' +tahunID,
                type: "GET",
                dataType: "json",
                success:function(data)
                {
                    jQuery('select[name="semester"').empty();
                    jQuery.each(data, function(key,value){
                        $('select[name="semester"]').append('<option value=" '+key +'"> '+value +'</option>');
                    });
                }

            });
        }
        else
        {
            $('select[name="semester"').empty();
        }
    });
});
</script>
@endsection
