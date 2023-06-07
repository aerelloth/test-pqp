<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><i class="bi bi-camera-reels-fill"></i> Plus que PROjection</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#links" aria-controls="links" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="links">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/movies') }}">Tous les films</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/dashboard') }}">Tableau de bord</a>
                            @else
                          <a class="nav-link" href="{{ url('/login') }}">Connexion</a>
                        </li>
                        @if (Route::has('register'))
                            <li><a class="nav-link" href="{{ route('register') }}">Inscription</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>