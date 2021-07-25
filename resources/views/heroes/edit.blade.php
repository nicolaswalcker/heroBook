@extends('layout.template')

@section('titulo')
    Edit | {{ $hero->name }}
@endsection

@section('tituloSecao')
     <h1 class="c-logo">Alterar genética de herói</h1>
@endsection

@section('content')
    <div class="l-edit-container">
        <form action="{{ route('heroes.update', $hero->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            <img class="c-hero-edit-image" src="{{ url("/storage/{$hero->image}") }}" alt="{{ $hero->name }}">
            @include('heroes._partials.form')
             
            <div class="c-redirect-buttons">
                <button class="c-submit-buttom" type="submit">Salvar</button>
                <a class="c-back-button" href="{{ route('heroes.index') }}">Voltar</a>
            </div>
        </form>
    @endsection
</div>
