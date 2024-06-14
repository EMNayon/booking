<?php

namespace App\Models;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // public function hotels(){
    //     return $this->belongsToMany(Hotel::class);
    // }

    // public function agoda()
    // {
    //     return $this->hasMany(Agoda::class);
    // }
}
