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

<x-layout title="{{ $materi->judul }}">
    <div class="flex flex-row justify-between mb-3">
        <button type="button" class="btn bg-primary text-white rounded"
            onclick="document.location.href = '{{ route('materi.index') }}'">
            <i class="uil uil-step-backward-alt"></i>
        </button>

        <div>
            <button type="button" class="btn bg-success text-white rounded"
                onclick="document.location.href = '{{ route('materi.edit', $materi->id) }}'">
                <i class="uil uil-edit"></i>
            </button>
            <form action="{{ route('materi.delete', $materi->id) }}" method="post" id="deleteForm"
                style="display: inline">
                @method('DELETE')
                @csrf
                <button type="button" class="btn bg-danger text-white rounded" onclick="deleteData()">
                    <i class="uil uil-trash"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="grid lg:grid-cols-5 gap-2">
        <div class="card p-5 rounded col-span-3">
            <h1 class="font-bold text-xl">
                {{ $materi->judul }}
            </h1>
            <small>Dibuat pada {{ Carbon\Carbon::parse($materi->created_at)->isoFormat('DD MMMM YYYY') }} pukul
                {{ Carbon\Carbon::parse($materi->created_at)->isoFormat('HH:mm') }}</small>
            <div class="mt-3">
                {!! $materi->konten !!}
            </div>
        </div>
        <div class="card p-5 rounded col-span-2">
            <h1 class="font-bold text-xl mb-3">
                Video
            </h1>
            <iframe src="{{ $materi->url_youtube }}">
            </iframe>
        </div>
    </div>
</x-layout>
