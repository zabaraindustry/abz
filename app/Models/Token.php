<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class Token extends Model
{
    use HasFactory;

    public $fillable = ['token'];

    public static function createToken()
    {
        $token = Crypt::encryptString(Str::uuid());
        return self::create([
            'token' => $token
        ]);
    }
}
