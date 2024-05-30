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

    public function edit(User $user): View
    {
        return view('pages.user-edit', compact('user'));
    }

    public function update(User $user): RedirectResponse
    {
        $data = request()->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'jk' => 'required',
            'no_hp' => 'required'
        ]);

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Update pengguna berhasil');
    }

    public function delete(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus');
    }
}
