<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class TokenController extends Controller
{
    public function index(Token $token)
    {
        $token = $token::createToken();
        return response()->json([
            'success' => true,
            'token'=> $token->token,
        ]);
    }
}
