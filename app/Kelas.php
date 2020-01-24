<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{

    protected $table ='kelas';
    protected $fillable =['nama_kelas', 'walikelas'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function nilai(){
        return $this->hasMany(Nilai::class);
    }
}
