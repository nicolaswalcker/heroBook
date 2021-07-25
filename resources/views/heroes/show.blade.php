@extends('layout.template')

@section('titulo')
    {{ $hero->name }}
@endsection

@section('content')
    <div class="l-show-container">
        <div class="c-hero-card">
            <div class="c-control-buttons">
                <form class="c-control-buttons-form" action="{{ route('heroes.destroy', $hero->id) }}" method="post">
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
            <img class="c-hero-image" src="{{ url("/storage/{$hero->image}") }}" alt="{{ $hero->name }}">
            <h3 class="c-hero-name">{{ $hero->name }}</h3>
            <p class="c-hero-description">{{ Str::limit($hero->description ?? '', 300, '...') }}
                @foreach (explode(',', $hero->powerups) as $powerup)
                    <span class="c-hero-powerup">{{ $powerup }}</span>
                @endforeach
            </p>
        </div>
        <a class="c-back-button" href="{{ route('heroes.index') }}">Voltar</a>
    </div>
@endsection
