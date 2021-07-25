@extends('layout.template')

@section('titulo')
    HeroBook | Create
@endsection

@section('content')
    <div class="c-create-container">
        <h1 class="c-section-title">Adicionar novo herói ao seu time!</h1>
        <form action="{{ route('heroes.store') }}" method="post" enctype="multipart/form-data">
            @include('heroes._partials.form')
            <div class="c-redirect-buttons">
                <button class="c-submit-buttom" type="submit">Cadastrar</button>
                <a class="c-back-button" href="{{ route('heroes.index') }}">Voltar</a>
            </div>
        </form>
    </div>

@endsection
