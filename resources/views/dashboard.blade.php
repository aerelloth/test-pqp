@extends('layouts.bootstrap.layout')

<h1 class="mt-5 pt-3 pb-3 display-3 text-center">{{ __('Tableau de bord') }}</h1>
<div class="row text-center">
    @auth
        @if (auth()->user()->hasRole('Super-Admin') || auth()->user()->hasRole('admin'))
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="p-5 m-3 bg-light border rounded-3">
                    <a href="{{ route('movies_listing') }}">
                    <i class="bi bi-film display-1"></i>
                    </a>
                    <p class="mt-2">Voir tous les films</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="p-5 m-3 bg-light border rounded-3">
                    <a href="{{ route('movies_listing') }}">
                    <i class="bi bi-arrow-repeat display-1"></i>
                    </a>
                    <p class="mt-2">Lancer la synchro API</p>
                </div>
            </div>
        @endif
    @endauth

    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="p-5 m-3 bg-light border rounded-3">
            <a href="{{ route('profile.show') }}">
            <i class="bi bi-person display-1"></i>
            </a>
            <p class="mt-2">Mon profil</p>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="p-5 m-3 bg-light border rounded-3">
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a href="{{ route('logout') }}"
                         @click.prevent="$root.submit();">
                    <i class="bi bi-box-arrow-right display-1"></i>
                </a>
            </form>
            <p class="mt-2">Déconnexion</p>
        </div>
    </div>
</div>
