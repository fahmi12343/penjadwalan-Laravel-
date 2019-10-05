<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $guarded=[];
    protected $fillable = ['nip', 'nama', 'telp', 'email'];
}
