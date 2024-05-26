@push('styles')
    <style>
        .cursor-pointer {
            cursor: pointer
        }
    </style>
@endpush

<x-layout title="Daftar Materi">
    <h1 class="font-bold text-xl mb-3">
        Materi Terbaru
    </h1>

    @foreach ($daftarMateri as $materi)
        <div class="card p-5 rounded cursor-pointer mb-3"
            onclick="document.location.href = '{{ route('materi.show', $materi->id) }}'">
            <h1 class="font-bold text-xl">
                {{ $materi->judul }}
            </h1>
            <small>Dibuat pada {{ Carbon\Carbon::parse($materi->created_at)->isoFormat('DD MMMM YYYY') }} pukul
                {{ Carbon\Carbon::parse($materi->created_at)->isoFormat('HH:mm') }}</small>

            <p class="mt-3">
                {!! Str::limit(strip_tags($materi->konten), 250) !!}
            </p>
        </div>
    @endforeach

    {{ $daftarMateri->links() }}
</x-layout>
