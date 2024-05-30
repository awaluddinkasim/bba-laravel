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

        function deleteData() {
            Swal.fire({
                title: "Anda yakin?",
                text: "Data yang terhapus tak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                confirmButtonText: "Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteForm').submit()
                }
            })
        }
    </script>
@endpush

<x-layout title="Daftar Pengguna">
    <x-elements.card>
        <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->jk }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>
                            <button class="btn bg-success text-white rounded"
                                onclick="document.location.href = '{{ route('users.edit', $user->id) }}'">
                                <i class="uil uil-edit"></i>
                            </button>
                            <form action="{{ route('users.delete', $user->id) }}" method="post" id="deleteForm"
                                style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="btn bg-danger text-white rounded" onclick="deleteData()">
                                    <i class="uil uil-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-elements.card>
</x-layout>
