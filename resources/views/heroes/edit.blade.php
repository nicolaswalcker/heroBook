@extends('layout.template')

@section('titulo')
    Edit | {{ $hero->name }}
@endsection

@section('content')
    <div class="l-edit-container">
        <h1 class="c-section-title">Alterar genética de herói</h1>
        <form action="{{ route('heroes.update', $hero->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @include('heroes._partials.form')
            <div class="c-redirect-buttons">
                <button class="c-submit-buttom" type="submit">Salvar</button>
                <a class="c-back-button" href="{{ route('heroes.index') }}">Voltar</a>
            </div>
        </form>
    @endsection
</div>
