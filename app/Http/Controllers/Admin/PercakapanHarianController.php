<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PercakapanHarian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PercakapanHarianController extends Controller
{
    public function index(): View
    {
        return view('pages.percakapan', [
            'daftarPercakapanHarian' => PercakapanHarian::orderBy('kalimat')->simplePaginate(10)
        ]);
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'kalimat' => 'required',
        ]);

        $translate = translate($data['kalimat']);

        $data['arab'] = $translate['arab'];
        $data['latin'] = $translate['latin'];


        PercakapanHarian::create($data);


        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function show(PercakapanHarian $percakapanHarian): View
    {
        return view('pages.percakapan-detail', compact('percakapanHarian'));
    }

    public function edit(PercakapanHarian $percakapanHarian): View
    {
        return view('pages.percakapan-edit', compact('percakapanHarian'));
    }

    public function update(PercakapanHarian $percakapanHarian): RedirectResponse
    {
        $data = request()->validate([
            'kalimat' => 'required',
            'arab' => 'required',
            'latin' => 'required'
        ]);

        $percakapanHarian->update($data);

        return redirect()->route('percakapan-harian.index')->with('success', 'Update data berhasil');
    }

    public function delete(PercakapanHarian $percakapanHarian): RedirectResponse
    {
        $percakapanHarian->delete();

        return redirect()->route('percakapan-harian.index')->with('success', 'Data berhasil dihapus');
    }
}
