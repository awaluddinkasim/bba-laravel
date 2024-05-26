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
    <div class="card p-6 rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-semibold text-xl">Daftar Kosakata</h2>
            <button class="btn bg-primary text-white rounded"
                onclick="document.location.href = '{{ route('kosakata.add') }}'">
                Tambah
            </button>
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
    </div>
</x-layout>
