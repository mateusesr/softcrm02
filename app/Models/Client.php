<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    protected $fillable = [
        'city_id',
        'name',
        'email',
        'phone',
        'updated_at',
    ];

    public function city() {
        return $this->belongsTo(City::class);
    }

}
