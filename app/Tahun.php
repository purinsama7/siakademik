<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    protected $table ='tahun';
    protected $fillable =['tahun_pel', 'semester'];

    public function nilai(){
        return $this->hasMany(Nilai::class);
    }
}
