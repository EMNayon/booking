<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class,'id','created_by');
    }

    const VACCINE_NAME_1 ='Pfizer (Pfizer-BioNTech)';
    const VACCINE_NAME_2 ='Moderna (Moderna)';
    const VACCINE_OTHER ='Other';
}
