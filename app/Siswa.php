<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table ='siswa';
    protected $fillable =['nisn','nama_depan', 'nama_belakang', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'avatar', 'user_id', 'kelas_id'];

    public function getAvatar()
    {
        if (!$this->avatar) {
        return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['avatar' => 'default.jpg']);
    }
    public function nilai(){
        return $this->hasMany(Nilai::class);
    }
}
