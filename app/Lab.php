<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $table = 'lab';
    protected $guarded=[];
    protected $fillable = ['nama_lab', 'desk_lab'];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($model)
    //     {
    //         $model->{$model->getKeyName()} = static::idlab(Input::get('nama_lab'));

    //         return true;
    //     });
    // }

    // public static function lastRecord()
    // {
    //     return static::select(DB::raw('SUBSTR(nama_lab, 3) AS nama_lab'))->orderBy('nama_lab', 'DESC')->first();
    // }

    // private static function idlab($hotel)
    // {
    //     if ($record = static::lastRecord()) {
    //     switch ($hotel) {
    //     case 'Brighten Rest':
    //     return 'LAB' . ++$record->id;

    //     case 'Brighten Inn':
    //     return 'LAB' . ++$record->id;
    // }
    // }

    //     switch ($hotel) {
    //     case 'Brighten Rest':
    //     return 'LAB' . 1000;

    //     case 'Brighten Inn':
    //     return 'LAB' . 1000;
    // }
    // }
}
