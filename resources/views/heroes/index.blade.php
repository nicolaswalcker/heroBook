@extends('layout.template')
@section('titulo')
    HeroBook | Home
@endsection
@section('tituloSecao')
    <a class="c-logo" href="{{ route('heroes.index') }}">HeroBook</a>
@endsection
@section('content')
    <div class="l-index-container">
        <div class="c-header-container">
            <form class="c-filter-form" action="{{ route('heroes.search') }}" method="post">
                @csrf
                <div class="c-search-input-label">
                    <label class="c-search-label" for="search">Filtrar por poderes</label>
                    <input class="c-search-input" id="search" type="text" name="search" placeholder="Filtrar">
                </div>
                <button class="c-search-button" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <a class="c-create-hero-button" href="{{ route('heroes.create') }}"><span><i
                        class="fas fa-plus-square c-plus-image"></i></span>Cadastrar novo herói</a>
            @if (session('message'))
                <p class="c-success-message">{{ session('message') }}<i class="fas fa-check-square"></i></p>
            @endif
        </div>
        <div class="l-hero-area">
            @foreach ($heroes as $hero)
                <div class="c-hero-card">
                    <div class="c-control-buttons">
                        <form class="c-control-buttons-form" action="{{ route('heroes.destroy', $hero->id) }}"
                            method="post">
                            @csrf
                            <span><a class="c-control-button" href="{{ route('heroes.show', $hero->id) }}">
                                    <i class="fas fa-eye"></i></a></span>
                            <span><a class="c-control-button" href="{{ route('heroes.edit', $hero->id) }}">
                                    <i class="fas fa-edit"></i></a></span>
                            <input type="hidden" name="_method" value="delete">
                            <button class="c-control-button" type="submit">
                                <i class="fas fa-window-close"></i>
                            </button>
                        </form>
                    </div>
                    <div class="c-content-card">
                        <h3 class="c-hero-name">{{ $hero->name }}</h3>
                        <img class="c-hero-image" src="{{ url("/storage/{$hero->image}") }}" alt="{{ $hero->name }}">
                        <p class="c-hero-description">{{ Str::limit($hero->description ?? '', 150, '...') }}
                        </p>

                        <div class="c-powerup-area">
                            @foreach (explode(',', $hero->powerups) as $powerup)
                                <span class="c-hero-powerup">{{ $powerup }}</span>
                            @endforeach
                        </div>

                    </div>

                </div>
            @endforeach
        </div>
        @if (isset($filters))
            {{ $heroes->appends($filters)->links() }}
        @else
            {{ $heroes->links() }}
        @endif
    </div>

@endsection
