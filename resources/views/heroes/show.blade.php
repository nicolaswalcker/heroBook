@extends('layout.template')

@section('titulo')
    {{ $hero->name }}
@endsection

@section('tituloSecao')
    <h1 class="c-logo">Sala de visualização heróica</h1>
@endsection

@section('content')
    <div class="l-show-container">
        <div class="c-hero-card data-tilt">
            <div class="c-control-buttons">
                <form class="c-control-buttons-form" action="{{ route('heroes.destroy', $hero->id) }}" method="post">
                    @csrf
                    
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
                <p class="c-hero-description">{{ Str::limit($hero->description ?? '', 300, '...') }}
                </p>

                <div class="c-powerup-area">
                    @foreach (explode(',', $hero->powerups) as $powerup)
                        <span class="c-hero-powerup">{{ $powerup }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="c-back-show-button">
        <a class="c-back-button c-back-show-button" href="{{ route('heroes.index') }}">Voltar</a>
    </div>
@endsection
