<?php

namespace App\Exports;

use App\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromView
{
    public function view(): View
    {
        return view('siswa.excel', [
            'data_siswa' => Siswa::all()
        ]);
    }
}
