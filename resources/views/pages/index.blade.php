<x-layout>
    <div class="grid lg:grid-cols-3 gap-3">
        <div class="card rounded-lg">
            <div class="p-5 flex items-center justify-between">
                <span>
                    <span class="text-slate-400 font-semibold block">Total Materi</span>
                    <span class="text-xl font-semibold"><span>{{ number_format($materi) }}</span></span>
                </span>

                <span
                    class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                    <i class="uil uil-book text-xl"></i>
                </span>
            </div>
        </div>
        <div class="card rounded-lg">
            <div class="p-5 flex items-center justify-between">
                <span>
                    <span class="text-slate-400 font-semibold block">Total Kosakata</span>
                    <span class="text-xl font-semibold"><span>{{ number_format($kosakata) }}</span></span>
                </span>

                <span
                    class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                    <i class="uil uil-hipchat text-xl"></i>
                </span>
            </div>
        </div>
        <div class="card rounded-lg">
            <div class="p-5 flex items-center justify-between">
                <span>
                    <span class="text-slate-400 font-semibold block">Total Percakapan Harian</span>
                    <span class="text-xl font-semibold"><span>{{ number_format($percakapanHarian) }}</span></span>
                </span>

                <span
                    class="flex justify-center items-center h-14 w-14 bg-blue-600/5 shadow shadow-blue-600/5 text-blue-600">
                    <i class="uil uil-comments text-xl"></i>
                </span>
            </div>
        </div>
    </div>
</x-layout>
