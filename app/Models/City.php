<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{


    protected $fillable = [
        'name',
        'uf'
    ];

    public static function getAllCities() {
        return self::all();
    }

}
