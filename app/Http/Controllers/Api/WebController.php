<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function test(Request $request)
    {
        return response()->json([
            'message' => 'API is working fine',
            'status' => 200
        ]);
    }
}
