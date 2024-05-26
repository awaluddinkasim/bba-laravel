@push('scripts')
    <script>
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

<x-layout title="Detail Kosakata">
    <div class="grid md:grid-cols-2 gap-4">
        <div class="card py-10 px-6 rounded-lg">
            <h1 class="font-bold text-xl">Kata</h1>
            <p class="text-3xl">{{ $vocabulary->kata }}</p>
            <p class="mb-4 text-xl">{{ $vocabulary->latin }}</p>

            <h1 class="font-bold text-xl">Arti</h1>
            <p class="mb-4 text-xl">{{ $vocabulary->arti }}</p>

            <h1 class="font-bold text-xl">Contoh Kalimat</h1>
            <p class="text-xl">{!! nl2br($vocabulary->contoh_kalimat) !!}</p>

            <div class="flex justify-between mt-8">
                <button class="btn bg-secondary text-white rounded"
                    onclick="document.location.href = '{{ route('kosakata') }}'">Kembali</button>
                <div>
                    <button class="btn bg-success text-white rounded"
                        onclick="document.location.href = '{{ route('kosakata.edit', $vocabulary->id) }}'">
                        Edit
                    </button>
                    <button class="btn bg-danger text-white rounded" onclick="deleteData()">
                        Delete
                    </button>
                    <form action="{{ route('kosakata.delete', $vocabulary->id) }}" method="post" id="deleteForm">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div>
            <img src="{{ asset('assets/images/svg/lang.svg') }}" alt="">
        </div>
    </div>
</x-layout>
