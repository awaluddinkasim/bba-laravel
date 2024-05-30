<x-layout title="Profil">

    <div class="grid md:grid-cols-2 gap-4">

        <x-elements.card>

            <form action="{{ route('profile.update') }}" method="post" autocomplete="off">
                @method('PATCH')
                @csrf

                <div class="mb-3">
                    <label for="namaInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Nama</label>
                    <input type="text" id="namaInput" name="nama"
                        class="form-input @error('nama') border-danger @enderror" value="{{ auth()->user()->nama }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="emailInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Email</label>
                    <input type="email" id="emailInput" name="email"
                        class="form-input @error('email') border-danger @enderror" value="{{ auth()->user()->email }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="passwordInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Ganti
                        Password</label>
                    <input type="password" id="passwordInput" name="password"
                        class="form-input @error('password') border-danger @enderror" value="">
                </div>

                <button class="btn bg-primary text-white rounded mt-4" onclick="update()">Simpan</button>
            </form>


        </x-elements.card>

        <img src="{{ asset('assets/images/admin.svg') }}" alt="" style="max-width: 450px"
            class="mx-auto sm:hidden md:block">

    </div>
</x-layout>
