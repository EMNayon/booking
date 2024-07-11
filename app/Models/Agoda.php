<?php

namespace App\Models;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agoda extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    // public function roomType()
    // {
    //     return $this->belongsTo(RoomType::class);
    // }
}
