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

<x-layout title="Detail Percakapan Harian">
    <div class="grid md:grid-cols-2 gap-4">
        <div class="card py-10 px-6 rounded-lg">
            <p class="text-xl mb-4">
                {{ $percakapanHarian->kalimat }}
            </p>

            <p class="font-bold text-black text-4xl">
                {{ $percakapanHarian->arab }}
            </p>
            <p class="text-xl">
                {{ $percakapanHarian->latin }}
            </p>

            <div class="flex justify-between mt-8">
                <button class="btn bg-primary text-white rounded"
                    onclick="document.location.href = '{{ route('percakapan-harian.index') }}'">
                    <i class="uil uil-step-backward-alt"></i>
                </button>
                <div>
                    <button class="btn bg-success text-white rounded"
                        onclick="document.location.href = '{{ route('percakapan-harian.edit', $percakapanHarian->id) }}'">
                        <i class="uil uil-edit"></i>
                    </button>
                    <form action="{{ route('percakapan-harian.delete', $percakapanHarian->id) }}" method="post"
                        id="deleteForm" style="display: inline">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn bg-danger text-white rounded" onclick="deleteData()">
                            <i class="uil uil-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <img src="{{ asset('assets/images/svg/lang.svg') }}" alt="">
        </div>
    </div>
</x-layout>
