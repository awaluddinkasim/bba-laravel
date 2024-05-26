@push('styles')
    <!-- quill css -->
    <link href="{{ asset('assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
    <!-- quill js -->
    <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>
    <script>
        // Snow theme
        var quill = new Quill('#snow-editor', {
            theme: 'snow',
            modules: {
                'toolbar': [
                    [{
                        'font': []
                    }, {
                        'size': []
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'script': 'super'
                    }, {
                        'script': 'sub'
                    }],
                    [{
                        'header': [false, 1, 2, 3, 4, 5, 6]
                    }, 'blockquote', 'code-block'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }, {
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    ['direction', {
                        'align': []
                    }],
                    ['clean']
                ]
            },
        });

        function update() {
            $('#kontenInput').val(quill.root.innerHTML)
            $('#materiForm').submit()
        }
    </script>
@endpush

<x-layout title="Edit Materi">
    <div class="card p-6 rounded-lg">
        <form action="{{ route('materi.update', $materi->id) }}" method="post" id="materiForm">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label for="judulInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Judul</label>
                <input type="text" id="judulInput" name="judul"
                    class="form-input @error('judul') border-danger @enderror" value="{{ $materi->judul }}" required>
            </div>
            <div class="mb-3">
                <label for="kontenInput" class="text-gray-800 text-sm font-medium inline-block mb-2">Konten</label>
                <!-- Quill Editors -->
                <div id="snow-editor" style="height: 300px;">
                    {!! $materi->konten !!}
                </div>
                <textarea class="hidden" name="konten" id="kontenInput" required></textarea>
            </div>
            <div class="mb-3">
                <label for="youtubeInput" class="text-gray-800 text-sm font-medium inline-block mb-2">URL
                    Youtube</label>
                <div class="flex">
                    <div
                        class="flex items-center justify-center border border-[#e0e6ed] bg-[#eee] px-3 font-semibold ltr:rounded-l-md ltr:border-r-0 rtl:rounded-r-md">
                        https://
                    </div>
                    <input type="text" id="youtubeInput" name="url_youtube"
                        class="form-input @error('url_youtube') border-danger @enderror ltr:rounded-l-none rtl:rounded-r-none"
                        value="{{ explode('//', $materi->url_youtube)[1] }}" required>
                </div>
            </div>
            <button tyoe="button" class="btn bg-primary text-white rounded mt-4" onclick="update()">Simpan</button>
        </form>
    </div>
</x-layout>
