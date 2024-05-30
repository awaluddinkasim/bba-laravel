@push('styles')
    <style>
        .cursor-pointer {
            cursor: pointer
        }
    </style>
@endpush

<x-layout title="Daftar Materi">
    <x-elements.title class="mb-3">
        Materi Terbaru
    </x-elements.title>
    @forelse ($daftarMateri as $materi)
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
    @empty
        <div class="card text-center p-8 rounded-lg">
            Tidak ada materi
        </div>
    @endforelse

    {{ $daftarMateri->links() }}
</x-layout>
