<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vocabulary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            'contoh_kalimat' => 'required',
            'audio' => 'required'
        ]);

        $audio = request()->file('audio');
        $filename = time() . '.' . $audio->extension();
        $data['audio'] = $filename;
        $audio->move(public_path('vocabulary'), $filename);

        Vocabulary::create($data);

        return redirect()->route('kosakata.index')->with('success', 'Kotakata berhasil ditambah');
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
            'contoh_kalimat' => 'required',
            'audio' => 'nullable'
        ]);

        if ($data['audio']) {
            File::delete(public_path('vocabulary/' . $vocabulary->audio));

            $audio = request()->file('audio');
            $filename = time() . '.' . $audio->extension();
            $data['audio'] = $filename;
            $audio->move(public_path('vocabulary'), $filename);
        }

        $vocabulary->update($data);

        return redirect()->route('kosakata.show', $vocabulary->id)->with('success', 'Kosakata berhasil diupdate');
    }

    public function delete(Vocabulary $vocabulary): RedirectResponse
    {
        File::delete(public_path('vocabulary/' . $vocabulary->audio));

        $vocabulary->delete();

        return redirect()->route('kosakata.index')->with('success', 'Kosakata berhasil dihapus');
    }
}
