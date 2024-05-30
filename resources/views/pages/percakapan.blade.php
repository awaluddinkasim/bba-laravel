<x-layout title="Percakapan Harian">
    <div class="flex flex-row justify-between items-center mb-3">
        <x-elements.title>
            Daftar Percakapan Harian
        </x-elements.title>

        <x-elements.form-modal title="Percakapan Harian" action="{{ route('percakapan-harian.store') }}">
            <div class="mb-3">
                <label for="kalimatInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Kalimat (Bahasa
                    Indonesia)</label>
                <textarea name="kalimat" id="kalimatInput" rows="3" class="form-input @error('kalimat') border-danger @enderror"
                    required></textarea>
            </div>
        </x-elements.form-modal>
    </div>

    @forelse ($daftarPercakapanHarian as $percakapanHarian)
        <div class="card p-5 rounded cursor-pointer mb-3"
            onclick="document.location.href = '{{ route('percakapan-harian.show', $percakapanHarian->id) }}'">
            <p class="text-xl mb-4">
                {{ $percakapanHarian->kalimat }}
            </p>

            <p class="font-bold text-black text-4xl">
                {{ $percakapanHarian->arab }}
            </p>
            <p class="text-xl">
                {{ $percakapanHarian->latin }}
            </p>
        </div>
    @empty
        <div class="card text-center p-8 rounded-lg">
            Tidak ada data
        </div>
    @endforelse

    {{ $daftarPercakapanHarian->links() }}

</x-layout>
