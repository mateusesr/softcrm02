<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{


    protected $fillable = [
        'attendance_id',
        'description'
    ];


    public function attendance() {
        return $this->belongsTo(Attendance::class);
    }

}


