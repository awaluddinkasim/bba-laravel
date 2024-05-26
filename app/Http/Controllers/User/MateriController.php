<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\MateriResource;
use App\Models\Materi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function get(): JsonResponse
    {
        return response()->json([
            'message' => 'success',
            'daftarMateri' => MateriResource::collection(Materi::orderBy('judul')->get())
        ], 200);
    }
}
