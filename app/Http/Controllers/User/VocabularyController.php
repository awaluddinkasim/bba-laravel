<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\VocabularyResource;
use App\Models\Vocabulary;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    public function get(): JsonResponse
    {
        if (request()->has('filter')) {
            return response()->json([
                'message' => 'success',
                'vocabularies' => VocabularyResource::collection(
                    Vocabulary::where('latin', 'like', '%' . request()->filter . '%')
                        ->orWhere('arti', 'like', '%' . request()->filter . '%')
                        ->orderBy('arti')->get()
                )
            ], 200);
        }

        return response()->json([
            'message' => 'success',
            'vocabularies' => VocabularyResource::collection(
                Vocabulary::orderBy('arti')->get()
            )
        ], 200);
    }
}
