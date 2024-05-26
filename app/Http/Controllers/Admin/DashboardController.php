<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\PercakapanHarian;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('pages.index', [
            'materi' => Materi::all()->count(),
            'kosakata' => Vocabulary::all()->count(),
            'percakapanHarian' => PercakapanHarian::all()->count(),
        ]);
    }
}
