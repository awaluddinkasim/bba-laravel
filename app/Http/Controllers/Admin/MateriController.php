<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MateriController extends Controller
{
    public function index(): View
    {
        return view('pages.materi', [
            'daftarMateri' => Materi::all()
        ]);
    }

    public function create(): View
    {
        return view();
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'judul' => 'required',
            'konten' => 'required',
            'url_youtube' => 'required'
        ]);

        Materi::create($data);

        return redirect()->back()->with('success', 'Materi berhasil disimpan');
    }

    public function show(Materi $materi): View
    {
        return view();
    }

    public function edit(Materi $materi): View
    {
        return view();
    }

    public function update(Materi $materi): RedirectResponse
    {
        $data = request()->validate([
            'judul' => 'required',
            'konten' => 'required',
            'url_youtube' => 'required'
        ]);

        $materi->update($data);

        return redirect()->back()->with('success', 'Update materi berhasil');
    }

    public function delete(Materi $materi): RedirectResponse
    {
        $materi->delete();

        return redirect()->back()->with('success', 'Materi berhasil dihapus');
    }
}
