<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Employee extends Model
{
    use HasFactory;

//    public function getCreatedAtAttribute($created_at)
//    {
//        $unixTimestamp = Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->timestamp;
//
//        return $unixTimestamp;
//    }
}
