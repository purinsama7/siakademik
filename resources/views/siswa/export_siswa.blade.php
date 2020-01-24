<!DOCTYPE html>
<html>
<head>
	<title>Cetak PDF Data Siswa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <h5>SMP Negeri 2 Baturraden</h4>
        </center>
<h3 class="m-0 font-weight-bold text-primary">Data Siswa</h3>
    <table class='table table-bordered'>
        <thead>
            <tr class=" text-center" role="row">
                <th class="text-center">KELAS</th>
                <th class="text-center">NISN</th>
                <th class="sorting_asc text-center" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending" style="width: 120px;" aria-sort="ascending">NAMA DEPAN</th>
                <th class="text-center">NAMA BELAKANG</th>
                <th class="text-center">TEMPAT LAHIR</th>
                <th class="text-center">TANGGAL LAHIR</th>
                <th class="text-center">JENIS KELAMIN</th>
                <th class="text-center">AGAMA</th>
                <th class="text-center">ALAMAT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $siswa)
            <tr class="text-center">
                <td>{{ $siswa->kelas->nama_kelas}}</td>
                <td>{{ $siswa->nisn }}</td>
                <td>{{ $siswa->nama_depan }}</td>
                <td>{{ $siswa->nama_belakang }}</td>
                <td>{{ $siswa->tempat_lahir }}</td>
                <td>{{ $siswa->tanggal_lahir }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->agama }}</td>
                <td>{{ $siswa->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
