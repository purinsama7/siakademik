<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection
{
    public function collection(Collection $collection, array)
    {
        foreach ($collection as $key => $row)
        {
            if ($key > 2) {
                # code...
                $tanggal_lahir = ($row[5] - 25569) * 86400;
                Siswa::create([
                    'nisn' => $row[1],
                    'nama_depan' => $row[2],
                    'nama_belakang' => $row[3],
                    'tempat_lahir' => $row[4],
                    'tanggal_lahir' => gmdate('d-m-y', $tanggal_lahir),
                    'jenis_kelamin' => $row[6],
                    'agama' => $row[7],
                    'alamat' => $row[8],
                ]);
            }
        }
    }
}
