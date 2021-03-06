<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function rooms()
    {
        return $this->hasMany(Room::class, 'hotel_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'account_id','hotel_id', 'id');
    }
}
