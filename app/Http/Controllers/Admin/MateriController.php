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
            'daftarMateri' => Materi::orderBy('id', 'DESC')->simplePaginate(10)
        ]);
    }

    public function create(): View
    {
        return view('pages.materi-add');
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'judul' => 'required',
            'konten' => 'required',
            'url_youtube' => 'required'
        ]);

        $data['url_youtube'] = embedYoutube($data['url_youtube']);

        Materi::create($data);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil disimpan');
    }

    public function show(Materi $materi): View
    {
        return view('pages.materi-detail', compact('materi'));
    }

    public function edit(Materi $materi): View
    {
        return view('pages.materi-edit', compact('materi'));
    }

    public function update(Materi $materi): RedirectResponse
    {
        $data = request()->validate([
            'judul' => 'required',
            'konten' => 'required',
            'url_youtube' => 'required'
        ]);

        $data['url_youtube'] = embedYoutube($data['url_youtube']);

        $materi->update($data);

        return redirect()->route('materi.show', $materi->id)->with('success', 'Update materi berhasil');
    }

    public function delete(Materi $materi): RedirectResponse
    {
        $materi->delete();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus');
    }
}
