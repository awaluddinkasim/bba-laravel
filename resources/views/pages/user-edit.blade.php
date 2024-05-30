<x-layout title="Edit Pengguna">

    <div class="grid md:grid-cols-2 gap-4">

        <img src="{{ asset('assets/images/account.svg') }}" alt="" style="max-width: 450px" class="mx-auto">

        <x-elements.card>

            <form action="{{ route('users.update', $user->id) }}" method="post" autocomplete="off">
                @method('PATCH')
                @csrf

                <div class="mb-3">
                    <label for="namaInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Nama</label>
                    <input type="text" id="namaInput" name="nama"
                        class="form-input @error('nama') border-danger @enderror" value="{{ $user->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="emailInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Email</label>
                    <input type="email" id="emailInput" name="email"
                        class="form-input @error('email') border-danger @enderror" value="{{ $user->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="passwordInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Ganti
                        Password</label>
                    <input type="password" id="passwordInput" name="password"
                        class="form-input @error('password') border-danger @enderror" value="">
                </div>

                <div class="mb-3">
                    <label for="jkInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Jenis
                        Kelamin</label>
                    <select id="jkInput" name="jk" class="form-input @error('jk') border-danger @enderror"
                        required>
                        <option value="L" {{ $user->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $user->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="noHPInput" class="text-gray-800 text-sm font-medium inline-block mb-2">No. HP</label>
                    <input type="text" id="noHPInput" name="no_hp"
                        class="form-input @error('no_hp') border-danger @enderror" value="{{ $user->no_hp }}" required>
                </div>
                <button class="btn bg-primary text-white rounded mt-4" onclick="update()">Simpan</button>
            </form>

        </x-elements.card>
    </div>
</x-layout>
