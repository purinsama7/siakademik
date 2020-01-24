<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kepsek extends Model
{
    //
    protected $table ='kepsek';
    protected $fillable =['nip', 'user_id', 'nama_depan', 'nama_belakang', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'avatar'];

    public function getAvatar()
    {
        if (!$this->avatar) {
        return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }
}
