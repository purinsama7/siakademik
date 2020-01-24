<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ketram extends Model
{
    protected $table ='ketram';
    protected $fillable =['kelas_id','tahun_id','uh1', 'uh2', 'uh3', 'uh4', 'uh5', 'uh6', 'uh7', 'uh8', 'uh9', 'uh10', 'uh11', 'uts', 'uas', 'siswa_id'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function tahun(){
        return $this->belongsTo(Tahun::class);
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
}
