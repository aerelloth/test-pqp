<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><i class="bi bi-camera-reels-fill"></i> Plus que PROjection</a>
        <div class="navbar-nav" id="links">
            <ul class="navbar-nav flex-row">
                <li class="nav-item ps-2 pe-2">
                    <a class="nav-link" href="{{ url('/movies') }}" title="Tous les films">
                        <i class="bi bi-film d-inline d-md-none"></i>
                        <span class="d-none d-md-inline">Tous les films</span>
                    </a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item ps-2 pe-2">
                            <a class="nav-link" href="{{ route('dashboard') }}" title="Tableau de bord">
                                <i class="bi bi-tools d-inline d-md-none"></i>
                                <span class="d-none d-md-inline">Tableau de bord</span>
                            </a>
                            @else
                            <a class="nav-link" href="{{ route('login') }}" title="Connexion">
                                <i class="bi bi-person-circle d-inline d-md-none"></i>
                                <span class="d-none d-md-inline">Connexion</span>
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item ps-2 pe-2">
                                <a class="nav-link" href="{{ route('register') }}" title="Inscription">
                                    <i class="bi bi-person-plus d-inline d-md-none"></i>
                                    <span class="d-none d-md-inline">Inscription</span>
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
