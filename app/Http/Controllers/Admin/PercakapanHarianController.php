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
        return view('pages.percakapan-harian', [
            'daftarPercakapanHarian' => PercakapanHarian::orderBy('kalimat')->get()
        ]);
    }

    public function create(): View
    {
        return view();
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'kalimat' => 'required',
        ]);

        $translate = translate($data['kalimat']);

        $data['arab'] = $translate('arab');
        $data['latin'] = $translate('latin');

        PercakapanHarian::create($data);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function show(PercakapanHarian $percakapanHarian): View
    {
        return view();
    }

    public function edit(PercakapanHarian $percakapanHarian): View
    {
        return view();
    }

    public function update(PercakapanHarian $percakapanHarian): RedirectResponse
    {
        $data = request()->validate([
            'kalimat' => 'required',
            'arab' => 'required',
            'latin' => 'required'
        ]);

        $percakapanHarian->update($data);

        return redirect()->back()->with('success', 'Update data berhasil');
    }

    public function delete(PercakapanHarian $percakapanHarian): RedirectResponse
    {
        $percakapanHarian->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
