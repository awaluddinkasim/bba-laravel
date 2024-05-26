<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('pages.users', [
            'users' => User::all()
        ]);
    }

    public function show(User $user): View
    {
        return view();
    }

    public function edit(User $user): View
    {
        return view();
    }

    public function update(User $user): RedirectResponse
    {
        $data = request()->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'nullable',
            'jk' => 'required',
            'alamat' => 'required'
        ]);

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Update pengguna berhasil');
    }

    public function delete(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus');
    }
}
