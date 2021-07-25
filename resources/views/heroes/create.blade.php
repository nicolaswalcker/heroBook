@extends('layout.template')

@section('titulo')
    HeroBook | Create
@endsection

@section('tituloSecao')
     <h1 class="c-logo">Adicionar novo herói ao seu time!</h1>
@endsection

@section('content')
    <div class="l-create-container">
        <form action="{{ route('heroes.store') }}" method="post" enctype="multipart/form-data">
            @include('heroes._partials.form')
            <div class="c-redirect-buttons">
                <button class="c-submit-buttom" type="submit">Cadastrar</button>
                <a class="c-back-button" href="{{ route('heroes.index') }}">Voltar</a>
            </div>
        </form>
    </div>

@endsection
