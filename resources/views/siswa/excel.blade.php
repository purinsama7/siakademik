<table id="example" class="table table-bordered">
    <thead>
        <tr class=" text-center" role="row">
            <th class="text-center">KELAS</th>
            <th class="text-center">NISN</th>
            <th class="text-center">NAMA DEPAN</th>
            <th class="text-center">NAMA BELAKANG</th>
            <th class="text-center">TEMPAT LAHIR</th>
            <th class="text-center">TANGGAL LAHIR</th>
            <th class="text-center">JENIS KELAMIN</th>
            <th class="text-center">AGAMA</th>
            <th class="text-center">ALAMAT</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_siswa as $siswa)
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
