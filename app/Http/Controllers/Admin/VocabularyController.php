<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vocabulary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VocabularyController extends Controller
{
    public function index(): View
    {
        return view('pages.kosakata', [
            'daftarKosakata' => Vocabulary::orderBy('arti')->get()
        ]);
    }

    public function create(): View
    {
        return view('pages.kosakata-add');
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'kata' => 'required',
            'arti' => 'required',
            'latin' => 'required',
            'contoh_kalimat' => 'required'
        ]);

        Vocabulary::create($data);

        return redirect()->route('kosakata')->with('success', 'Kotakata berhasil ditambah');
    }

    public function show(Vocabulary $vocabulary): View
    {
        return view('pages.kosakata-detail', compact('vocabulary'));
    }

    public function edit(Vocabulary $vocabulary): View
    {
        return view('pages.kosakata-edit', compact('vocabulary'));
    }

    public function update(Vocabulary $vocabulary): RedirectResponse
    {
        $data = request()->validate([
            'kata' => 'required',
            'arti' => 'required',
            'latin' => 'required',
            'contoh_kalimat' => 'required'
        ]);

        $vocabulary->update($data);

        return redirect()->route('kosakata.show', $vocabulary->id)->with('success', 'Kosakata berhasil diupdate');
    }

    public function delete(Vocabulary $vocabulary): RedirectResponse
    {
        $vocabulary->delete();

        return redirect()->route('kosakata')->with('success', 'Kosakata berhasil dihapus');
    }
}
