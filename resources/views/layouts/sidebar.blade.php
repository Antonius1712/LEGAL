<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ Route('check-sheet-bpkb.index') }}">
                    <i class="feather icon-file-text"></i>
                    <h2 class="brand-text mb-0">Legal</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>

    {{-- !DIBACA BAIK BAIK --}}
    {{-- !PUTRI MINTA SETELAH LOGIN LANGSUNG KE MENU CHECKSHEET TIDAK PERLU ADA HOMEPAGE. --}}
    {{-- !9 SEPTEMBER 2022 --}}
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- *DIATAS JGN DI COMMENT, BIAR BISA DI TOGGLE HIDE SIDEBAR. --}}
            {{-- <li class=" nav-item">
                <a href="{{ Route('check-sheet-bpkb.index') }}">
                    <i class="feather icon-file-plus"></i>
                    <span class="menu-title">
                        Check Sheet BPKB
                    </span>
                </a>
            </li> --}}
        </ul>
    </div>
</div>