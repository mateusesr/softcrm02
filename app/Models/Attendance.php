<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $fillable = [
        'client_id',
        'type_id',
        'date',
        'status',
        'description',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
