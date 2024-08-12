<!--- Menu -->
<div data-simplebar>
    <ul class="menu">
        <li class="menu-title">Menu</li>

        <li class="menu-item">
            <a href="/" class="menu-link">
                <span class="menu-icon"><i class="uil uil-estate"></i></span>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0)" data-hs-collapse="#sidenavMateri"
                class="menu-link {{ request()->segment(1) == 'materi' ? 'open' : '' }}">
                <span class="menu-icon"><i class="uil uil-book"></i></span>
                <span class="menu-text"> Manajemen Materi </span>
                <span class="menu-arrow"></span>
            </a>

            <ul id="sidenavMateri" class="sub-menu {{ request()->segment(1) == 'materi' ? 'open' : 'hidden' }}">
                <li class="menu-item">
                    <a href="{{ route('materi.add') }}" class="menu-link">
                        <span class="menu-dot"></span>
                        <span class="menu-text">Buat Baru</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('materi.index') }}" class="menu-link">
                        <span class="menu-dot"></span>
                        <span class="menu-text">Daftar Materi</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="{{ route('kosakata.index') }}" class="menu-link">
                <span class="menu-icon"><i class="uil uil-hipchat"></i></span>
                <span class="menu-text"> Kosakata </span>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('percakapan-harian.index') }}" class="menu-link">
                <span class="menu-icon"><i class="uil uil-comments"></i></span>
                <span class="menu-text"> Percakapan Harian </span>
            </a>
        </li>

    </ul>
</div>
