@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatable/datatables.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/libs/datatable/datatables.min.js') }}"></script>
    <script>
        new DataTable("#datatable", {
            ordering: false,
            lengthChange: false
        })
    </script>
@endpush

<x-layout title="Kosakata">
    <x-elements.card>
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-semibold text-xl">Daftar Kosakata</h2>
            <x-elements.form-modal title="Kosakata" action="{{ route('kosakata.store') }}">
                <div class="mb-3">
                    <label for="kataInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Kata</label>
                    <input type="text" id="kataInput" name="kata"
                        class="form-input @error('kata') border-danger @enderror" required>
                </div>
                <div class="mb-3">
                    <label for="latinInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Latin</label>
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
            </x-elements.form-modal>
        </div>

        <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kata</th>
                    <th>Latin</th>
                    <th>Arti</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarKosakata as $kosakata)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-lg">{{ $kosakata->kata }}</td>
                        <td>{{ $kosakata->latin }}</td>
                        <td>{{ $kosakata->arti }}</td>
                        <td class="text-center">
                            <button class="btn bg-success text-white rounded"
                                onclick="document.location.href = '{{ route('kosakata.show', $kosakata->id) }}'">
                                Detail
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-elements.card>
</x-layout>
