<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\PercakapanHarianResource;
use App\Models\PercakapanHarian;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PercakapanHarianController extends Controller
{
    public function get(): JsonResponse
    {
        return response()->json([
            'message' => 'success',
            'daftarPercakapan' => PercakapanHarianResource::collection(PercakapanHarian::orderBy('kalimat')->get())
        ], 200);
    }
}
