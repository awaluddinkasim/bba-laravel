<x-layout title="Tambah Kosakata">
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <img src="{{ asset('assets/images/svg/data.svg') }}" alt="">
        </div>
        <form action="{{ route('kosakata.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="card p-6 rounded-lg">
                <div>
                    <div class="mb-3">
                        <label for="kataInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Kata</label>
                        <input type="text" id="kataInput" name="kata"
                            class="form-input @error('kata') border-danger @enderror" required>
                    </div>
                    <div class="mb-3">
                        <label for="latinInput"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">Latin</label>
                        <input type="text" id="latinInput" name="latin"
                            class="form-input @error('latin') border-danger @enderror" required>
                    </div>
                    <div class="mb-3">
                        <label for="artiInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Arti</label>
                        <input type="text" id="artiInput" name="arti"
                            class="form-input @error('arti') border-danger @enderror" required>
                    </div>
                    <div class="mb-3">
                        <label for="contohInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Contoh
                            Kalimat</label>
                        <textarea name="contoh_kalimat" id="contohInput" rows="5"
                            class="form-input @error('contoh_kalimat') border-danger @enderror" required></textarea>
                    </div>
                </div>
                <button class="btn bg-primary text-white rounded">Submit</button>
            </div>

        </form>
    </div>
</x-layout>
