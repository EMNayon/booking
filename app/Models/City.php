<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
