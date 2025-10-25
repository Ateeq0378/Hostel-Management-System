<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Student extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function room(){
        return $this->belongsTo(Room::class, 'room_number');
    }
}