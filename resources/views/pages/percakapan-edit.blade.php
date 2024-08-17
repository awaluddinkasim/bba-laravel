<x-layout title="Edit Percakapan Harian">
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <img src="{{ asset('assets/images/svg/data.svg') }}" alt="">
        </div>
        <form action="{{ route('percakapan-harian.update', $percakapanHarian->id) }}" method="post" autocomplete="off"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card p-6 rounded-lg">
                <div class="mb-3">
                    <label for="kalimatInput"
                        class="text-gray-800 text-sm font-medium inline-block mb-2">Kalimat</label>
                    <textarea name="kalimat" id="kalimatInput" rows="3" class="form-input @error('kalimat') border-danger @enderror"
                        required>{{ $percakapanHarian->kalimat }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="arabInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Bahasa
                        Arab</label>
                    <textarea name="arab" id="arabInput" rows="3"
                        class="text-2xl form-input @error('arab') border-danger @enderror" required>{{ $percakapanHarian->arab }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="latinInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Latin</label>
                    <input type="text" id="latinInput" name="latin"
                        class="form-input @error('latin') border-danger @enderror"
                        value="{{ $percakapanHarian->latin }}" required>
                </div>
                <div class="mb-3">
                    <label for="audioInput" class="text-gray-800 text-sm font-medium inline-block mb-2">
                        Ganti Audio
                    </label>
                    <input type="file" name="audio" id="audioInput" accept="audio/*"
                        class="form-input @error('audio') border-danger @enderror">
                </div>

                <button class="btn bg-success text-white rounded">Simpan</button>
            </div>

        </form>
    </div>
</x-layout>
