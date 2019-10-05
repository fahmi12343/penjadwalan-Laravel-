<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    protected $table = 'matkul';
    protected $guarded=[];

    //menjadikan kd_matkul primary key
    protected $primaryKey = 'kd_matkul';
    //menonaktifkan angka
    public $incrementing = false;

    protected $fillable = ['kd_matkul', 'nama_matkul'];
}
